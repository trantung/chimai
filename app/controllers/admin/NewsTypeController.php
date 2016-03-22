<?php 

class NewsTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputNewType = TypeNew::where('language', VI)->orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.typenew.index')->with(compact('inputNewType'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.typenew.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    	$input = Input::except('_token');
    	$validator = CommonRule::checkRules($input, 'TypeNewCreate');
		if(isset($validator)) {
			return Redirect::action('NewsTypeController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'TypeNew', CommonProperty::getDefaultValue('TypeNew', $input), self::getConfigImage($input));
		if ($viId) {
			Common::commonUpdateField('BoxType', $viId, 'box_type_id', 'TypeNew', 'BoxCommon');
			return Redirect::action('NewsTypeController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('NewsTypeController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('TypeNew', $id, VI);
		$listId = AdminLanguage::where('model_name', 'TypeNew')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = TypeNew::whereIn('id', $listId)->get();
		return View::make('admin.typenew.edit')->with(compact('boxVi', 'boxEn'));
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
        $validator = CommonRule::checkRules($input, 'TypeNewEdit');
		if(isset($validator)) {
			return Redirect::action('NewsTypeController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('TypeNew', $id, $input, CommonProperty::getDefaultValue('TypeNew', $input), self::getConfigImage($input));
		Common::commonUpdateField('BoxType', $id, 'box_type_id', 'TypeNew', 'BoxCommon');
		return Redirect::action('NewsTypeController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		TypeNew::find($id)->delete();
		return Redirect::action('NewsTypeController@index');
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
