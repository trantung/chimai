<?php

class AdminProductController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = Product::where('language', VI)->orderBy('id', 'desc')->paginate(PAGINATE);
		// $list = AdminLanguage::where('model_name', 'Product')->lists('model_id');
		return View::make('admin.product.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.product.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token', 'size_id', 'category_id', 'surface_id');
		$validator = CommonRule::checkRules(Input::except('_token'), 'ProductCreate');
		if(isset($validator)) {
			return Redirect::action('AdminProductController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'Product', CommonProperty::getDefaultValue('Product', $input), self::getConfigImage($input));
		if ($viId) {
			Common::attachCommon('AdminLanguage', 'Product', $viId, 'productCategories', Input::get('category_id'));
			Common::attachCommon('AdminLanguage', 'Product', $viId, 'productSizes', Input::get('size_id'));
			Common::attachCommon('AdminLanguage', 'Product', $viId, 'productSurfaces', Input::get('surface_id'));
			
			Common::commonUpdateField('Material', $viId, 'material_id', 'Product', 'AdminLanguage');
			Common::commonUpdateField('Origin', $viId, 'origin_id', 'Product', 'AdminLanguage');
			Common::commonUpdateField('AdminUnit', $viId, 'unit_id', 'Product', 'AdminLanguage');
			
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $viId, 'Product',
				'Surface', 'SurfaceProduct', 'surface_id', 'product_id');
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $viId, 'Product',
				'Category', 'CategoryProduct', 'category_id', 'product_id');
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $viId, 'Product',
				'Size', 'SizeProduct', 'size_id', 'product_id');
			
			return Redirect::action('AdminProductController@edit', $viId);
		}
		return Redirect::action('AdminProductController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Product', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Product')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Product::whereIn('id', $listId)->get();

		$colors = CommonProduct::getProductBoxImages($id, PRODUCT_COLOR, 'color_box_images');
		$pictures = CommonProduct::getProductBoxImages($id, PRODUCT_PICTURE, 'picture_box_images');
		
		return View::make('admin.product.edit')->with(compact('boxVi', 'boxEn', 'colors', 'pictures'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token', 'size_id', 'category_id', 'surface_id');
		$validator = CommonRule::checkRules(Input::except('_token'), 'ProductEdit');
		if(isset($validator)) {
			return Redirect::action('AdminProductController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('Product', $id, $input, CommonProperty::getDefaultValue('Product', $input), self::getConfigImage($input));
		Common::syncCommon('AdminLanguage', 'Product', $id, 'productCategories', Input::get('category_id'));
		Common::syncCommon('AdminLanguage', 'Product', $id, 'productSizes', Input::get('size_id'));
		Common::syncCommon('AdminLanguage', 'Product', $id, 'productSurfaces', Input::get('surface_id'));

		Common::commonUpdateField('Material', $id, 'material_id', 'Product', 'AdminLanguage');
		Common::commonUpdateField('Origin', $id, 'origin_id', 'Product', 'AdminLanguage');
		Common::commonUpdateField('AdminUnit', $id, 'unit_id', 'Product', 'AdminLanguage');
		
		CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $id, 'Product',
				'Surface', 'SurfaceProduct', 'surface_id', 'product_id');
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $id, 'Product',
				'Category', 'CategoryProduct', 'category_id', 'product_id');
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'AdminLanguage', $id, 'Product',
				'Size', 'SizeProduct', 'size_id', 'product_id');
		return Redirect::action('AdminProductController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::detachCommon('AdminLanguage', 'Product', $id, 'productCategories');
		Common::detachCommon('AdminLanguage', 'Product', $id, 'productSizes');
		Common::detachCommon('AdminLanguage', 'Product', $id, 'productSurfaces');
		CommonLanguage::deleteModel('Product', $id);
		return Redirect::action('AdminProductController@index')->with('message', 'Xoá thành công');
	}

	private function getConfigImage($input)
	{
		return array(
				'w' => IMAGE_PRODUCT_WIDTH, 
				'h' => IMAGE_PRODUCT_HEIGHT, 
				'mode' => IMAGE_MODE_FILL
			);
	}

}
