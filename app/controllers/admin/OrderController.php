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
    	$input = Input::only('payment', 'status', 'message', 'orderId');
    	Order::find($input['orderId'])
    		->update(array(
    				'payment' => $input['payment'],
    				'status' => $input['status'],
    				'message' => $input['message'],
    			));
		return Redirect::action('OrderController@index');
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
		$order = Order::find($id);
		$products = OrderProduct::where('order_id', $id)->get();
		return View::make('admin.order.edit')->with(compact('products', 'order'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::only('payment', 'status', 'message');
    	Order::find($id)
    		->update(array(
    				'payment' => $input['payment'],
    				'status' => $input['status'],
    				'message' => $input['message'],
    			));
		return Redirect::action('OrderController@index');
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
		$orderId = Input::get('orderId');
		if($code == '' || $email == '') {
			return 'empty';
		}
		$user = User::where('email', $email)->first();
		$product = Product::where('code', $code)->first();
		if(!$user) {
			return 'email';
		}
		if(!$product) {
			return 'code';
		}
		//neu chua co orderId thi tao moi order
		if(!$orderId) {
			$orderCode = date("YmdHis");
			$total = CommonCart::getDiscountPriceTotal($product->price, CommonCart::getDiscountByUserRole($user));
			$discount = CommonCart::getDiscountPrice($product->price, CommonCart::getDiscountByUserRole($user));
			$orderId = Order::create(array(
		        			'code' => $orderCode,
		        			'total' => $total,
		        			'discount' => $discount,
		        			'user_id' => $user->id,
		        			'message' => $message,
		        			'payment' => $payment,
		        			'status' => $status,
		        		))->id;
		}
		// neu da co orderId thi tao them product
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
			//cap nhat order
			$amount = CommonCart::getTotalAmount($orderId);
			$totalUpdate = CommonCart::getDiscountPriceTotal($amount, CommonCart::getDiscountByUserRole($user));
			$discountUpdate = CommonCart::getDiscountPrice($amount, CommonCart::getDiscountByUserRole($user));
			Order::find($orderId)->update(array(
					'total' => $totalUpdate,
        			'discount' => $discountUpdate,
        			'message' => $message,
        			'payment' => $payment,
        			'status' => $status,
				));
			return $orderId;
    	}
    	return;
	}

	public function reloadOrderListProduct()
	{
		$orderId = Input::get('orderId');
		return CommonCart::loadViewOrderListProduct($orderId);
	}

	public function removeOrderProduct()
	{
		$orderId = Input::get('orderId');
		$productId = Input::get('productId');
		$orderProduct = OrderProduct::where('order_id', $orderId)
			->where('product_id', $productId)
			->first();
		if($orderProduct) {
			$orderProduct->delete();
		}
		return CommonCart::loadViewOrderListProduct($orderId);
	}

	public function updateOrderProduct()
	{
		$input = Input::all();
		$orderId = $input['order_id'];
		//update order
		$orderInput = array(
				'total' => $input['total'],
				'discount' => $input['discount'],
			);
		Order::find($orderId)->update($orderInput);
		//update order products
		foreach($input['id'] as $key => $value) {
			$orderProductInput = array(
				'color_id' => $input['color_id'][$key],
				'size_id' => $input['size_id'][$key],
				'surface_id' => $input['surface_id'][$key],
				'qty' => $input['qty'][$key],
				'amount' => $input['amount'][$key],
			);
			OrderProduct::find($value)->update($orderProductInput);
		}
		//order discount
		$orderDiscountInput = array(
				'order_id' => $orderId,
				'discount_id' => $input['discount_id'],
			);
		OrderDiscount::create($orderDiscountInput);
		return CommonCart::loadViewOrderListProduct($orderId);
	}

}
