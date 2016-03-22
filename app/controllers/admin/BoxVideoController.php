<?php

class BoxVideoController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'BoxVideo')->lists('model_id');
		return View::make('admin.box.collection.video.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.box.collection.video.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token', 'box_collection_id');
		$validator = CommonRule::checkRules(Input::except('_token'), 'BoxVideoCreate');
		if(isset($validator)) {
			return Redirect::action('BoxVideoController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'BoxVideo', CommonProperty::getDefaultValue('BoxVideo', $input), self::getConfigImage($input));
		if ($viId) {
			Common::attachCommon('AdminLanguage', 'BoxVideo', $viId, 'boxCollections', Input::get('box_collection_id'));
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'BoxCommon', $viId, 'BoxVideo',
				'BoxCollection', 'CollectionBoxVideo', 'box_collection_id', 'video_id');
			return Redirect::action('BoxVideoController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxVideoController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('BoxVideo', $id, VI);
		$listId = AdminLanguage::where('model_name', 'BoxVideo')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxVideo::whereIn('id', $listId)->get();
		return View::make('admin.box.collection.video.edit')->with(compact('boxVi', 'boxEn'));
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
		$validator = CommonRule::checkRules(Input::except('_token'), 'BoxVideoEdit');
		if(isset($validator)) {
			return Redirect::action('BoxVideoController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('BoxVideo', $id, $input, CommonProperty::getDefaultValue('BoxVideo', $input));
		Common::syncCommon('AdminLanguage', 'BoxVideo', $id, 'boxCollections', Input::get('box_collection_id'));
		CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'BoxCommon', $id, 'BoxVideo',
				'BoxCollection', 'CollectionBoxVideo', 'box_collection_id', 'video_id');
		return Redirect::action('BoxVideoController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::detachCommon('AdminLanguage', 'BoxVideo', $id, 'boxCollections');
		CommonLanguage::deleteModel('BoxVideo', $id);
		return Redirect::action('BoxVideoController@index')->with('message', 'Xoá thành công');
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
