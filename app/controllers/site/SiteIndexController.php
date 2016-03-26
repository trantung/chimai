<?php

class SiteIndexController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('site.index');
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

	public function slug($slug)
	{	
		$object = CommonSite::getObjectBySlug($slug);
		if ($object['model_name'] == 'BoxType') {
			$data = CommonSite::getDataByModelSlug($object, 'TypeNew', 'box_type_id', TAKE_NUMBER_BOX_TYPE);
			return View::make('site.about.index')->with(compact('data'));
		}
		if ($object['model_name'] == 'TypeNew') {
			$data = CommonSite::getDataByModelSlug($object, 'AdminNew', 'type_new_id');
			return View::make('site.news.list')->with(compact('data'));
		}
		if ($object['model_name'] == 'BoxPromotion') {
			$data = BoxPromotion::findbySlug($slug);
			$products = Product::where('status', ACTIVE)
							->where('price_old', '!=', '')
							->where('language', getLanguage())
							->paginate(FRONENDPAGINATE);
			return View::make('site.product.list')->with(compact('products', 'data'));
		}
		if ($object['model_name'] == 'BoxCollection') {
			$data = BoxCollection::findbySlug($slug);
			$boxPdfs = $data->boxPdfs;
			$boxVideos = $data->boxVideos;
			$boxShowRooms = $data->boxShowRooms;
			return View::make('site.catalogue.collection')->with(compact('boxPdfs', 'boxVideos', 'boxShowRooms', 'data'));
		}
		if ($object['model_name'] == 'BoxProduct') {
			$data = BoxProduct::findbySlug($slug);
			$origins = $data->origins;
			foreach ($origins as $key => $value) {
				$arrayOriginId[] = $value->id;
			}
			$products = Product::whereIn('origin_id', $arrayOriginId)->paginate(FRONENDPAGINATE);
			return View::make('site.product.list')->with(compact('products', 'data'));
		}
		if ($object['model_name'] == 'Origin') {
			$data = Origin::findbySlug($slug);
			$products = Product::where('status', ACTIVE)
							->where('origin_id', $data->id)
							->where('language', getLanguage())
							->paginate(FRONENDPAGINATE);
			return View::make('site.product.list')->with(compact('products', 'data'));
		}

		dd(4);
	}
	public function slugChild($slug, $slugChild)
	{	
		$object = CommonSite::getObjectBySlug($slugChild);
		if ($object['model_name'] == 'Product') {

			$data = Product::findbySlug($slugChild);
			return View::make('site.product.detail')->with(compact('data'));
		}
	}

}
