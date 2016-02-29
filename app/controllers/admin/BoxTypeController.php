<?php

class BoxTypeController extends BoxController {

	public function index()
	{
		$list = BoxType::all();
		return View::make('admin.box.type.index')->with(compact('list'));
	}

	public function create()
	{
		return View::make('admin.box.type.create');
	}

	public function store()
	{
		$input = Input::except('_token');
		$viId = Common::createBox($input, 'BoxType');
		if ($viId) {
			return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thất bại');
	}
	public function edit($id)
	{
		$boxVi = Common::getObjectByLang('BoxType', $id, VI);
		$boxEn = Common::getObjectByLang('BoxType', $id, EN);
		return View::make('admin.box.type.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$input = Input::except('_token');
		$enId = BoxCommon::where('model_name', 'BoxType')
			->where('model_id', $id)
			->where('relate_name', 'Boxtype')
			->first()->id;
		Common::updateBox('BoxType', $id, $input);
	}

	public function destroy($id)
	{
		$result = $this->boxDelete('BoxType', $id);
		if($result) {
			return Redirect::action('BoxTypeController@index')->with('message', 'Xoá thành công');
		}
	}


}