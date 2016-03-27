<?php

class AdminPdfController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'AdminPdf')->lists('model_id');
		return View::make('admin.pdf.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.pdf.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'AdminPdfCreate');
		if(isset($validator)) {
			return Redirect::action('AdminPdfController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'AdminPdf', CommonProperty::getDefaultValue('AdminPdf', $input), self::getConfigImage($input));
		CommonFile::uploadPdf($viId, UPLOADPDF, 'filePdf');
		if ($viId) {
			Common::commonUpdateField('BoxPdf', $viId, 'type', 'AdminPdf', 'AdminLanguage');
			return Redirect::action('AdminPdfController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminPdfController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('AdminPdf', $id, VI);
		$listId = AdminLanguage::where('model_name', 'AdminPdf')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = AdminPdf::whereIn('id', $listId)->get();
		return View::make('admin.pdf.edit')->with(compact('boxVi', 'boxEn'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'AdminPdf');
		if(isset($validator)) {
			return Redirect::action('AdminPdfController@edit', $id)->withErrors($validator);
		}
		$input['filePdf'] = CommonFile::uploadPdf($id, UPLOADPDF, 'filePdf', AdminPdf::find($id)->file);
		CommonLanguage::updateModel('AdminPdf', $id, $input, CommonProperty::getDefaultValue('AdminPdf', $input), self::getConfigImage($input));
		Common::commonUpdateField('BoxPdf', $id, 'type', 'AdminPdf', 'AdminLanguage');
		return Redirect::action('AdminPdfController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('AdminPdf', $id);
		return Redirect::action('AdminPdfController@index')->with('message', 'Xoá thành công');
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
