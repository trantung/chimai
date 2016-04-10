<?php 

class NewsTypeController extends AdminController {

	public function index()
	{
		$inputNewType = TypeNew::where('language', VI)->orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.typenew.index')->with(compact('inputNewType'));
	}

	public function search()
	{
		$input = Input::all();
		$inputNewType = CommonNews::searchTypeNew($input);
		return View::make('admin.typenew.index')->with(compact('inputNewType'));
	}

	public function create()
	{
		return View::make('admin.typenew.create');
	}

	public function store()
	{
    	$input = Input::except('_token');
    	$validator = CommonRule::checkRules($input, 'TypeNewCreate');
		if(isset($validator)) {
			return Redirect::action('NewsTypeController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'TypeNew', CommonProperty::getDefaultValue('TypeNew', $input), self::getConfigImage());
		if ($viId) {
			Common::commonUpdateTypeNew('BoxType', $viId, 'box_type_id', 'TypeNew', 'AdminLanguage');
			return Redirect::action('NewsTypeController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('NewsTypeController@index')->with('message', 'Tạo mới thất bại');
	}


	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$boxVi = CommonLanguage::getObjectByLang('TypeNew', $id, VI);
		$listId = AdminLanguage::where('model_name', 'TypeNew')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = TypeNew::whereIn('id', $listId)->get();
		return View::make('admin.typenew.edit')->with(compact('boxVi', 'boxEn'));
	}

	public function update($id)
	{
        $input = Input::except('_token');
        $validator = CommonRule::checkRules($input, 'TypeNewEdit');
		if(isset($validator)) {
			return Redirect::action('NewsTypeController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('TypeNew', $id, $input, CommonProperty::getDefaultValue('TypeNew', $input), self::getConfigImage($input));
		Common::commonUpdateTypeNew('BoxType', $id, 'box_type_id', 'TypeNew', 'AdminLanguage');
		return Redirect::action('NewsTypeController@index')->with('message', 'Sửa thành công');
	}

	public function destroy($id)
	{
		CommonLanguage::deleteModel('TypeNew', $id);
		return Redirect::action('NewsTypeController@index')->with('message', 'Xoá thành công');
	}

	private function getConfigImage()
	{
		return array(
				'w' => IMAGE_WIDTH, 
				'h' => IMAGE_HEIGHT, 
				'mode' => IMAGE_MODE_FILL
			);
	}

}
