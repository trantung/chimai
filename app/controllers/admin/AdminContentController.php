<?php

class AdminContentController extends BoxController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$boxs = BoxCommon::where('position', CONTENT)->get();
		return View::make('admin.content.index')->with(compact('boxs'));
	}

	public function updateIndexData()
	{
		$boxId = Input::get('box_id');
		$status = Input::get('status');
		$weightNumber = Input::get('weight_number');
		foreach($boxId as $key => $value) {
			$input = array(
				'status' => $status[$key],
				'weight_number' => $weightNumber[$key],
				);
			BoxCommon::find($value)->update($input);
		}
		dd(1);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$box = BoxCommon::find($id);
		$modelId = $box->model_id;
		if ($box->model_name == 'BoxPromotion') {
			$ob = Common::getObjectByModelId('BoxPromotion', $modelId);
			$boxVi = $ob[0];
			$boxEn = $ob[1];
			return View::make('admin.box.promotion.edit')->with(compact('boxVi', 'boxEn'));
		}
		if ($box->model_name == 'BoxType') {
			$ob = Common::getObjectByModelId('BoxType', $modelId);
			$boxVi = $ob[0];
			$boxEn = $ob[1];
			return View::make('admin.box.type.edit')->with(compact('boxVi', 'boxEn'));
		}
		if ($box->model_name == 'BoxCollection') {
			$ob = Common::getObjectByModelId('BoxCollection', $modelId);
			$boxVi = $ob[0];
			$boxEn = $ob[1];
			return View::make('admin.box.collection.edit')->with(compact('boxVi', 'boxEn'));
		}
		if ($box->model_name == 'BoxProduct') {
			$ob = Common::getObjectByModelId('BoxProduct', $modelId);
			$boxVi = $ob[0];
			$boxEn = $ob[1];
			return View::make('admin.box.product.edit')->with(compact('boxVi', 'boxEn'));
		}

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
