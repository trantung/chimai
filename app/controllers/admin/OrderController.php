<?php 

class OrderController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Order::orderBy('created_at', 'desc')->paginate(PAGINATE);
		return View::make('admin.order.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.order.create');
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
		return View::make('admin.order.edit');
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

	public function orderAddProduct()
	{
		$email = Input::get('email');
		$code = Input::get('code');
		$payment = Input::get('payment');
		$status = Input::get('status');
		$message = Input::get('message');
		if($code == '' || $email == '') {
			return 0;
		}
		$user = User::where('email', $email)->first();
		$product = Product::where('code', $code)->first();
		if(!$user) {
			return 1;
		}
		if(!$product) {
			return 2;
		}
		//neu chua co orderId thi tao moi order
		$discount = CommonCart::getDiscountByUserRole($user);
		$total = CommonCart::getDiscountPriceTotal($product->price, $discount);
		$orderId = Order::create(array(
	        			'code' => date("YmdHis"),
	        			'total' => $total,
	        			'discount' => $discount,
	        			'user_id' => $user->id,
	        			'message' => $message,
	        			'payment' => $payment,
	        			'status' => $status,
	        		))->id;
		// neu da co orderId thi chi cap nhat order + tao them product
		if($orderId) {
			OrderProduct::create(array(
					'product_id' => $product->id,
					'price' => $product->price,
					'qty' => 1,
					'amount' => $product->price,
					'order_id' => $orderId,
					'color_id' => null,
					'size_id' => null,
					'surface_id' => null,
				));
    	}
    	return $orderId;
	}

}
