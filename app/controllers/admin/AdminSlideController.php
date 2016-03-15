<?php

class AdminSlideController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = AdminSlide::where('language', VI)->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.slider.index')->with(compact('slides'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.slider.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'AdminSlide', self::getCommonInput($input), self::getConfigImage($input));
		if ($viId) {
			return Redirect::action('AdminSlideController@index')->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminSlideController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('AdminSlide', $id, VI);
		$listId = AdminLanguage::where('model_name', 'AdminSlide')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = AdminSlide::whereIn('id', $listId)->get();
		return View::make('admin.slider.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('AdminSlide', $id, $input, self::getCommonInput($input), self::getConfigImage($input));
		return Redirect::action('AdminSlideController@index')->with('message', 'Sửa thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('AdminSlide', $id);
		return Redirect::action('AdminSlideController@index')->with('message', 'Xoá thành công');
	}

	private function getWidthHeight($type)
	{
		switch ($type) {
			case SLIDE_BANNER_VALUE:
				return ['width' => IMAGE_SLIDE_WIDTH, 'height' => IMAGE_SLIDE_HEIGHT];
				break;
			case SLIDE_PARTNER_VALUE:
				return ['width' => IMAGE_PARTNER_WIDTH, 'height' => IMAGE_PARTNER_HEIGHT];
				break;
			default:
				return ['width' => IMAGE_SLIDE_WIDTH, 'height' => IMAGE_SLIDE_HEIGHT];
				break;
		}
	}

	private function getConfigImage($input)
	{
		$size = self::getWidthHeight($input['type']);
		return array(
				'w' => $size['width'], 
				'h' => $size['height'], 
				'mode' => IMAGE_MODE_FILL
			);
	}

	private function getCommonInput($input)
	{
		return [
				'type' => $input['type'], 
				'status' => $input['status'], 
				'weight_number' => $input['weight_number']
			];
	}

}
