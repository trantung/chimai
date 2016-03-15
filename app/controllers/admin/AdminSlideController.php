<?php

class AdminSlideController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = AdminSlide::orderBy('id', 'desc')->get();
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
		$input = Input::except('_token', 'image_url');
		$id = AdminSlide::create($input)->id;
		$size = self::getSlideWidthHeight($input['type']);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', 'AdminSlide', $size['width'], $size['height'], IMAGE_MODE_FILL);
		AdminSlide::find($id)->update(['image_url' => $imageUrl]);
		return Redirect::action('AdminSlideController@index')->with('message', 'Thêm thành công');
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
		$slide = AdminSlide::find($id);
		return View::make('admin.slider.edit')->with(compact('slide'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token', 'image_url');
		$slide = AdminSlide::find($id);
		$slide->update($input);
		$imageSlide = AdminSlide::find($id);
		$size = self::getSlideWidthHeight($input['type']);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', 'AdminSlide', $size['width'], $size['height'], IMAGE_MODE_FILL, $imageSlide->image_url);
		$slide->update(['image_url' => $imageUrl]);
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
		AdminSlide::find($id)->delete();
		return Redirect::action('AdminSlideController@index')->with('message', 'Xóa thành công');
	}

	private function getSlideWidthHeight($type)
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

}
