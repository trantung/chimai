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
		return View::make('site.cart.checkout');
	}

	public function checkoutSuccess()
	{
		return View::make('site.cart.checkout_success');
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
							// 'amount' => $product->price,
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
		
	}

	public function removeCart()
	{
		$rowid = Input::get('rowid');
		Cart::remove($rowid);
		return;
	}

}
