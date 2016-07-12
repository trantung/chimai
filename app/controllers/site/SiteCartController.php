<?php

class SiteCartController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$content = Cart::content();
		return View::make('site.cart.index')->with(compact('content'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function checkout()
	{
		$checkLogin = CommonSite::isLogin();
        if($checkLogin) {
        	$id = Auth::user()->get()->id;
			$data = User::find($id);
			$content = Cart::content();
			return View::make('site.cart.checkout')->with(compact('data', 'content'));
        } else {
            return Redirect::action('SiteController@login');
        }
	}

	public function checkoutSuccess()
	{
		$checkLogin = CommonSite::isLogin();
		if($checkLogin) {
			$user = Auth::user()->get();
			$input = Input::except('_token');
			$rules = array(
				'payment' => 'required|integer',
				'message' => 'max:256',
			);
			$validator = Validator::make($input, $rules);
			if($validator->fails()) {
				return Redirect::action('SiteCartController@checkout')
		            ->withErrors($validator);
	        } else {
	        	// to do: save order to db
	        	//save order
	        	$id = $user->id;
	        	$content = Cart::content();
	        	$orderId = Order::create(array(
	        			'code' => date("YmdHis"),
	        			'total' => CommonCart::getDiscountPriceTotal(Cart::total(), CommonCart::getDiscountByUserRole($user)),
	        			'discount' => CommonCart::getDiscountPrice(Cart::total(), CommonCart::getDiscountByUserRole($user)),
	        			'user_id' => $id,
	        			'message' => $input['message'],
	        			'payment' => $input['payment'],
	        			'status' => ORDER_STATUS_1,
	        		))->id;
	        	//save order product
	        	if($orderId && Cart::count() > 0) {
	        		foreach($content as $value) {
	        			OrderProduct::create(array(
	        					'product_id' => $value->id,
	        					'price' => $value->price,
	        					'qty' => $value->qty,
	        					'amount' => $value->subtotal,
	        					'order_id' => $orderId,
	        					'color_id' => $value->options->color_id,
	        					'size_id' => $value->options->size_id,
	        					'surface_id' => $value->options->surface_id,
	        				));
	        		}
	        	}
	        	$order = Order::find($orderId);
	        	// send email
	        	$data = array(
	        			'items' => $content,
	        			'order' => $order,

	        		);
                //send mail
                Mail::send('emails.email', $data, function($message) use ($user, $data){
                    $message->to(ORDER_EMAIL)->cc($user->email)
                            ->subject(trans('messages.subject'));
                });

	        	Cart::destroy();
	        	return View::make('site.cart.checkout_success')->with(compact('order'));	
	        }
	    } else {
            return Redirect::action('SiteController@login');
        }
	}

	public function addCart()
	{
		$id = Input::get('id');
		$product = Product::find($id);
		if($product) {
			Cart::add(
				array(
						'id' => $product->id,
						'name' => $product->name,
						'qty' => 1,
						'price' => $product->price,
						'options' => array(
							'code' => $product->code,
							'image_url' => url(CommonSlug::getImageUrlNotBox('Product', $product)),
							'url' => CommonSlug::getUrlSlug(CommonSite::getOriginByProduct($product->origin_id), $product->slug),
							'unit' => Common::getFieldByModel('AdminUnit', $product->unit_id, 'name'),
							'color_id' => null,
							'size_id' => null,
							'surface_id' => null,
						),
					)
				);
		}
		return;
	}

	public function updateCart()
	{
		$rowid = Input::get('rowid');
		$color_id = Input::get('color_id');
		$size_id = Input::get('size_id');
		$surface_id = Input::get('surface_id');
		$qty = Input::get('qty');
		$checkout = Input::get('checkout');
		if($rowid) {
			foreach($rowid as $key => $value) {
				Cart::update($value, array(
					'qty' => $qty[$key], 
					'options' => array(
							'color_id' => $color_id[$key], 
							'size_id' => $size_id[$key], 
							'surface_id' => $surface_id[$key]
						)
					)
				);
			}
		}
		if($checkout == 1) {
			// redirect to checkout page
			return 1;
		} else {
			// redirect to shopping cart page
			return;	
		}
	}

	public function removeCart()
	{
		$rowid = Input::get('rowid');
		Cart::remove($rowid);
		return;
	}

	public function printOrder($type = 0)
	{
		$content = Cart::content();
		if($type == 1) {
			return View::make('site.cart.printOrder')->with(compact('content'));
		} else {
			return View::make('site.cart.printOrderQty')->with(compact('content'));	
		}
	}

}
