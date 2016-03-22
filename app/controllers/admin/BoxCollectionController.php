<?php

class BoxCollectionController extends BoxController {

	public function index()
	{
		$list = BoxCommon::where('model_name', 'BoxCollection')->lists('model_id');
		return View::make('admin.box.collection.index')->with(compact('list'));
	}

	public function create()
	{
		return View::make('admin.box.collection.create');
	}

	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'BoxCollectionCreate');
		if(isset($validator)) {
			return Redirect::action('BoxCollectionController@create')->withErrors($validator);
		}
		$viId = Common::createBox($input, 'BoxCollection');
		if ($viId) {
			return Redirect::action('BoxCollectionController@index')->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxCollectionController@index')->with('message', 'Tạo mới thất bại');
	}

	public function edit($id)
	{
		$boxVi = Common::getObjectByLang('BoxCollection', $id, VI);
		$listId = BoxCommon::where('model_name', 'BoxCollection')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxCollection::whereIn('id', $listId)->get();
		return View::make('admin.box.collection.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'BoxCollectionEdit');
		if(isset($validator)) {
			return Redirect::action('BoxCollectionController@edit', $id)->withErrors($validator);
		}
		Common::updateBox('BoxCollection', $id, $input);
		return Redirect::action('BoxCollectionController@index')->with('message', 'Sửa thành công');
	}

	public function destroy($id)
	{
		Common::deleteBox('BoxCollection', $id);
		return Redirect::action('BoxCollectionController@index')->with('message', 'Xoá thành công');
	}


}
