<?php

class BoxShowRoomController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'BoxShowRoom')->lists('model_id');
		return View::make('admin.box.collection.showroom.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.box.collection.showroom.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token', 'box_collection_id');
		$validator = CommonRule::checkRules(Input::except('_token'), 'BoxShowRoomCreate');
		if(isset($validator)) {
			return Redirect::action('BoxShowRoomController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'BoxShowRoom', CommonProperty::getDefaultValue('BoxShowRoom', $input), self::getConfigImage($input));
		if ($viId) {
			Common::attachCommon('AdminLanguage', 'BoxShowRoom', $viId, 'boxCollections', Input::get('box_collection_id'));
			CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'BoxCommon', $id, 'BoxShowRoom',
				'BoxCollection', 'CollectionBoxShowroom', 'box_collection_id', 'box_show_room_id');
			return Redirect::action('BoxShowRoomController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxShowRoomController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('BoxShowRoom', $id, VI);
		$listId = AdminLanguage::where('model_name', 'BoxShowRoom')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxShowRoom::whereIn('id', $listId)->get();
		return View::make('admin.box.collection.showroom.edit')->with(compact('boxVi', 'boxEn'));
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
		$validator = CommonRule::checkRules(Input::except('_token'), 'BoxShowRoomEdit');
		if(isset($validator)) {
			return Redirect::action('BoxShowRoomController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('BoxShowRoom', $id, $input, CommonProperty::getDefaultValue('BoxShowRoom', $input));
		Common::syncCommon('AdminLanguage', 'BoxShowRoom', $id, 'boxCollections', Input::get('box_collection_id'));
		CommonNormal::commonUpdateManyRelateMany('AdminLanguage', 'BoxCommon', $id, 'BoxShowRoom',
				'BoxCollection', 'CollectionBoxShowroom', 'box_collection_id', 'box_show_room_id');
		return Redirect::action('BoxShowRoomController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::detachCommon('AdminLanguage', 'BoxShowRoom', $id, 'boxCollections');
		CommonLanguage::deleteModel('BoxShowRoom', $id);
		return Redirect::action('BoxShowRoomController@index')->with('message', 'Xoá thành công');
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
