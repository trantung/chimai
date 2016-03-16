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
		$input = Input::except('_token', 'origin_id');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BoxProductController@create')
				->withErrors($validator);
		} else {
			$viId = Common::createBox($input, 'BoxProduct');
			Common::attachCommon('BoxCommon', 'BoxProduct', $viId, 'origins', Input::get('origin_id'));
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
		//sync
		

		return View::make('admin.box.product.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$rules = CommonRule::getRules('BoxProduct');
		$input = Input::except('_token', 'origin_id');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BoxProductController@edit', $id)
				->withErrors($validator);
		} else {
			Common::updateBox('BoxProduct', $id, $input);
			Common::syncCommon('BoxCommon', 'BoxProduct', $id, 'origins', Input::get('origin_id'));
			return Redirect::action('BoxProductController@index')->with('message', 'Sửa thành công');;
		}
	}

	public function destroy($id)
	{
		Common::detachCommon('BoxCommon', 'BoxProduct', $id, 'origins');
		Common::deleteBox('BoxProduct', $id);
		return Redirect::action('BoxProductController@index')->with('message', 'Xoá thành công');
	}


}
