<?php

class AdminProductController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Product')->lists('model_id');
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
		$input = Input::except('_token', 'size_id', 'category_id');
		// size_id, category_id
		//'origin_id', 'material_id', 'unit_id', 'surface_id'
		$viId = CommonLanguage::createModel($input, 'Product', CommonProperty::getDefaultValue('Product', $input), self::getConfigImage($input));
		if ($viId) {
			Common::attachCommon('AdminLanguage', 'Product', $viId, 'productCategories', Input::get('category_id'));
			Common::attachCommon('AdminLanguage', 'Product', $viId, 'productSizes', Input::get('size_id'));
			
			Common::commonUpdateField('Surface', $viId, 'surface_id', 'Product', 'AdminLanguage');
			Common::commonUpdateField('Material', $viId, 'material_id', 'Product', 'AdminLanguage');
			Common::commonUpdateField('Origin', $viId, 'origin_id', 'Product', 'AdminLanguage');
			Common::commonUpdateField('AdminUnit', $viId, 'unit_id', 'Product', 'AdminLanguage');
			
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
		$input = Input::except('_token', 'size_id', 'category_id');
		CommonLanguage::updateModel('Product', $id, $input, CommonProperty::getDefaultValue('Product', $input), self::getConfigImage($input));
		Common::syncCommon('AdminLanguage', 'Product', $id, 'productCategories', Input::get('category_id'));
		Common::syncCommon('AdminLanguage', 'Product', $id, 'productSizes', Input::get('size_id'));

		Common::commonUpdateField('Surface', $id, 'surface_id', 'Product', 'AdminLanguage');
		Common::commonUpdateField('Material', $id, 'material_id', 'Product', 'AdminLanguage');
		Common::commonUpdateField('Origin', $id, 'origin_id', 'Product', 'AdminLanguage');
		Common::commonUpdateField('AdminUnit', $id, 'unit_id', 'Product', 'AdminLanguage');
		
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
		CommonLanguage::deleteModel('Product', $id);
		return Redirect::action('AdminProductController@index')->with('message', 'Xoá thành công');
	}

	private function getConfigImage($input)
	{
		return array(
				'w' => IMAGE_WIDTH, 
				'h' => IMAGE_HEIGHT, 
				'mode' => IMAGE_MODE_FILL
			);
	}

}
