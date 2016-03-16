<?php

class BoxPdfController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'BoxPdf')->lists('model_id');
		return View::make('admin.box.collection.pdf.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.box.collection.pdf.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token', 'box_collection_id');
		$viId = CommonLanguage::createModel($input, 'BoxPdf', CommonProperty::getDefaultValue('BoxPdf', $input), self::getConfigImage($input));

		if ($viId) {
			Common::attachCommon('AdminLanguage', 'BoxPdf', $viId, 'boxCollections', Input::get('box_collection_id'));
			return Redirect::action('BoxPdfController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxPdfController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('BoxPdf', $id, VI);
		$listId = AdminLanguage::where('model_name', 'BoxPdf')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxPdf::whereIn('id', $listId)->get();
		return View::make('admin.box.collection.pdf.edit')->with(compact('boxVi', 'boxEn'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token', 'box_collection_id');
		CommonLanguage::updateModel('BoxPdf', $id, $input, CommonProperty::getDefaultValue('BoxPdf', $input));
		Common::syncCommon('AdminLanguage', 'BoxPdf', $id, 'boxCollections', Input::get('box_collection_id'));
		return Redirect::action('BoxPdfController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::detachCommon('AdminLanguage', 'BoxPdf', $id, 'boxCollections');
		CommonLanguage::deleteModel('BoxPdf', $id);
		return Redirect::action('BoxPdfController@index')->with('message', 'Xoá thành công');
	}
	private function getConfigImage($input)
	{
		return array(
				'w' => IMAGE_CATALOG_WIDTH, 
				'h' => IMAGE_CATALOG_HEIGHT, 
				'mode' => IMAGE_MODE_FILL
			);
	}

}
