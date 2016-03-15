<?php

class BoxProductController extends BoxController {

	public function index()
	{
		$list = BoxCommon::where('model_name', 'BoxProduct')->lists('model_id');
		return View::make('admin.box.product.index')->with(compact('list'));
	}

	public function create()
	{
		return View::make('admin.box.product.create');
	}

	public function store()
	{
		$rules = CommonRule::getRules('BoxProduct');
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BoxProductController@create')
				->withErrors($validator);
		} else {
			$viId = Common::createBox($input, 'BoxProduct');
			if ($viId) {
				return Redirect::action('BoxProductController@index')->with('message', 'Tạo mới thành công');
			}
			return Redirect::action('BoxProductController@index')->with('message', 'Tạo mới thất bại');
		}
	}

	public function edit($id)
	{
		$boxVi = Common::getObjectByLang('BoxProduct', $id, VI);
		$listId = BoxCommon::where('model_name', 'BoxProduct')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = BoxProduct::whereIn('id', $listId)->get();
		return View::make('admin.box.product.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$rules = CommonRule::getRules('BoxProduct');
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BoxProductController@edit', $id)
				->withErrors($validator);
		} else {
			Common::updateBox('BoxProduct', $id, $input);
			return Redirect::action('BoxProductController@index')->with('message', 'Sửa thành công');;
		}
	}

	public function destroy($id)
	{
		Common::deleteBox('BoxProduct', $id);
		return Redirect::action('BoxProductController@index')->with('message', 'Xoá thành công');
	}


}
