<?php

class NewsController extends AdminController {

	public function index()
	{
		$inputNew = AdminNew::where('language', VI)->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.news.index')->with(compact('inputNew'));
	}

	public function search()
	{
		$input = Input::all();
		$inputNew = NewsManager::searchNews($input);
		return View::make('admin.news.index')->with(compact('inputNew'));
	}

	public function create()
	{
		return View::make('admin.news.create');
	}

	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'AdminNew', CommonProperty::defaultValueProperty($input), self::getConfigImage($input));
		if ($viId) {
			return Redirect::action('NewsController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('NewsController@index')->with('message', 'Tạo mới thất bại');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$boxVi = CommonLanguage::getObjectByLang('AdminNew', $id, VI);
		$listId = AdminLanguage::where('model_name', 'AdminNew')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = AdminNew::whereIn('id', $listId)->get();
		return View::make('admin.news.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
		$input = Input::except('_token');
		CommonLanguage::updateModel('AdminNew', $id, $input, CommonProperty::getDefaultValue('AdminNew', $input), self::getConfigImage($input));
		return Redirect::action('NewsController@index')->with('message', 'Sửa thành công');
	}

	public function destroy($id)
	{
		CommonLanguage::deleteModel('AdminNew', $id);
		return Redirect::action('NewsController@index')->with('message', 'Xoá thành công');
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
