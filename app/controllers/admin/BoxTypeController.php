<?php

class BoxTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = BoxType::where('status', ACTIVE)->get();
		return View::make('admin.box.type.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.box.type.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$viInput = Input::except('_token');
		$viId = Common::createBox($viInput, 'BoxType', VI);
		$enId = Common::createBox($viInput, 'BoxType', EN);
		$imageUrl = Common::uploadImage($viId, UPLOADIMG, 'image_url', BOXTYPE);
		$update = Common::updateBox($imageUrl, $viId, $enId, 'BoxType');
		if ($update) {
			return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thành công');
		}
		dd('sai cmnr');
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
