<?php

class BoxTypeController extends BoxController {

	public function index()
	{
		$list = BoxCommon::where('model_name', 'BoxType')->lists('model_id');
		return View::make('admin.box.type.index')->with(compact('list'));
	}

	public function create()
	{
		return View::make('admin.box.type.create');
	}

	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'BoxTypeCreate');
		if(isset($validator)) {
			return Redirect::action('BoxTypeController@create')->withErrors($validator);
		}
		$viId = Common::createBox($input, 'BoxType');
		if ($viId) {
			return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thất bại');
	}

	public function edit($id)
	{
		$boxVi = Common::getObjectByLang('BoxType', $id, VI);
		$listId = BoxCommon::where('model_name', 'BoxType')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxType::whereIn('id', $listId)->get();
		return View::make('admin.box.type.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'BoxTypeEdit');
		if(isset($validator)) {
			return Redirect::action('BoxTypeController@edit', $id)->withErrors($validator);
		}
		Common::updateBox('BoxType', $id, $input);
		return Redirect::action('BoxTypeController@index')->with('message', 'Sửa thành công');
	}

	public function destroy($id)
	{
		Common::deleteBox('BoxType', $id);
		return Redirect::action('BoxTypeController@index')->with('message', 'Xoá thành công');
	}

}
