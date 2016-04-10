<?php

class SiteIndexController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lang = getLanguage();
		$banners = AdminSlide::where('type', SLIDE_BANNER_VALUE)
			->where('status', ACTIVE)
			->where('language', $lang)->get();
		$partners = AdminSlide::where('type', SLIDE_PARTNER_VALUE)
			->where('status', ACTIVE)
			->where('language', $lang)->get();
		return View::make('site.index')->with(compact('banners', 'partners'));
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
			$boxType = $object['model_object'];
			if($boxType->parent_id == 0) {
				$boxTypeId = BoxType::where('parent_id', $boxType->id)->lists('id');
				$boxTypeId = array_merge([$boxType->id], $boxTypeId);
				$type = null;
			} else {
				$boxTypeId = [$boxType->id];
				$type = BoxType::where('id', $boxType->parent_id)->first();
			}
			$data = TypeNew::where('status', ACTIVE)
				->whereIn('box_type_id', $boxTypeId)
				->orderByRaw(DB::raw("weight_number = '0', weight_number"))
				->paginate(FRONENDPAGINATE);

			// $data = CommonSite::getDataByModelSlug($object, 'TypeNew', 'box_type_id');
			$title = $object['model_object']->name_menu;
			return View::make('site.news.list')->with(compact('data', 'title', 'boxType', 'type'));
		}
		// if ($object['model_name'] == 'TypeNew') {
		// 	$data = CommonSite::getDataByModelSlug($object, 'AdminNew', 'type_new_id');
		// 	$title = $object['model_object']->name;
		// 	return View::make('site.news.list')->with(compact('data', 'title'));
		// }
		if ($object['model_name'] == 'BoxPromotion') {
			$data = BoxPromotion::findbySlug($slug);
			$products = Product::where('status', ACTIVE)
							->where('price_old', '!=', '')
							->where('language', getLanguage())
							->paginate(FRONENDPAGINATE);
			$title = $object['model_object']->name_menu;
			return View::make('site.product.list')->with(compact('products', 'data', 'title'));
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
			$products = Product::where('status', ACTIVE)
							->whereIn('origin_id', $arrayOriginId)
							->orderByRaw(DB::raw("weight_number = '0', weight_number"))
							->orderBy('created_at', 'desc')
							->paginate(FRONENDPAGINATE);
			$title = $object['model_object']->name_menu;
			return View::make('site.product.list')->with(compact('products', 'title'));
		}
		if ($object['model_name'] == 'Origin') {
			$data = Origin::findbySlug($slug);
			$products = Product::where('status', ACTIVE)
							->where('origin_id', $data->id)
							->where('language', getLanguage())
							->orderByRaw(DB::raw("weight_number = '0', weight_number"))
							->orderBy('created_at', 'desc')
							->paginate(FRONENDPAGINATE);
			$title = $object['model_object']->name;
			return View::make('site.product.list')->with(compact('products', 'data', 'title'));
		}
		if ($object['model_name'] == 'BoxPdf') {
			$data = CommonSite::getDataByModelSlug($object, 'AdminPdf', 'type');
			$title = $object['model_object']->name;
			return View::make('site.catalogue.catalogue')->with(compact('data', 'title'));
		}
		if ($object['model_name'] == 'BoxShowRoom') {
			$data = CommonSite::getDataByModelSlug($object, 'AdminImage', 'type');
			$title = $object['model_object']->name;
			return View::make('site.catalogue.gallery')->with(compact('data', 'title'));
		}
		if ($object['model_name'] == 'BoxVideo') {
			$data = CommonSite::getDataByModelSlug($object, 'AdminVideo', 'type');
			$title = $object['model_object']->name;
			return View::make('site.catalogue.video')->with(compact('data', 'title'));
		}

		dd(4);
	}
	public function slugChild($slug, $slugChild)
	{	
		$object = CommonSite::getObjectBySlug($slugChild);
		if ($object['model_name'] == 'Product') {
			// $data = Product::findbySlug($slugChild);
			$data = Product::where('slug', $slugChild)
						->where('status', ACTIVE)
						->first();
			if(isset($data)) {
				$origin = Origin::find($data->origin_id);
				return View::make('site.product.detail')->with(compact('data', 'origin'));	
			} else {
				dd(404);
			}
		}
		if ($object['model_name'] == 'TypeNew') {
			$boxType = BoxType::where('slug', $slug)->first();
			if($boxType->parent_id == 0) {
				$type = null;
			} else {
				$type = BoxType::where('id', $boxType->parent_id)->first();
			}
			$data = TypeNew::where('slug', $slugChild)
						->where('status', ACTIVE)
						->first();
			if(isset($data) && isset($boxType)) {
				return View::make('site.news.detail')->with(compact('data', 'boxType', 'type'));
			} else {
				dd(404);
			}
		}
		// if ($object['model_name'] == 'AdminNew') {
		// 	$type = TypeNew::where('slug', $slug)
		// 				->where('status', ACTIVE)
		// 				->first();
		// 	$data = AdminNew::where('slug', $slugChild)
		// 				->where('status', ACTIVE)
		// 				->first();
		// 	if(isset($data) && isset($type)) {
		// 		return View::make('site.news.detail')->with(compact('data', 'type'));
		// 	} else {
		// 		dd(404);
		// 	}
		// }
		dd(5);
	}
	public function search()
	{
		$input = Input::except('_token');
		$products = Product::where('language', getLanguage())
			->where('status', ACTIVE)
			->where('name', 'LIKE', '%' . $input['keyword'] . '%')
			->orderBy('created_at', 'desc')
			->paginate(FRONENDPAGINATE);
		$title = trans('messages.result_search');
		return View::make('site.product.list')->with(compact('products', 'title'));
	}

	public function filter($slug)
	{
		$input = Input::except('_token');
		if (BoxProduct::findbySlug($slug)) {
			$products = Product::select('products.*')
				->join('materials', 'products.material_id', '=', 'materials.id')
				->join('surface_products', 'products.id', '=', 'surface_products.product_id')
				->join('surfaces', 'surfaces.id', '=', 'surface_products.surface_id')
				->join('category_products', 'products.id', '=', 'category_products.product_id')
				->join('categories', 'categories.id', '=', 'category_products.category_id')
				->join('size_products', 'products.id', '=', 'size_products.product_id')
				->join('sizes', 'sizes.id', '=', 'size_products.size_id')
				->distinct()
				->where('products.language', getLanguage())
				->where('products.status', ACTIVE);
			if(isset($input['category'])) {
				$products = $products->whereIn('category_products.category_id', $input['category']);
			}
			if(isset($input['material'])) {
				$products = $products->whereIn('materials.id', $input['material']);
			}
			if(isset($input['surface'])) {
				$products = $products->whereIn('surface_products.surface_id', $input['surface']);
			}
			if(isset($input['size'])) {
				$products = $products->whereIn('size_products.size_id', $input['size']);
			}

			$products =	$products->orderByRaw("products.weight_number = '0', products.weight_number")
				->orderBy('products.id', 'desc')
				->paginate(FRONENDPAGINATE);
			$title = trans('messages.result_search');
			return View::make('site.product.list')->with(compact('products', 'title'));
		}
		if ($origin = Origin::findbySlug($slug)) {

			$products = Product::select('products.*')
				->join('materials', 'products.material_id', '=', 'materials.id')
				->join('surface_products', 'products.id', '=', 'surface_products.product_id')
				->join('surfaces', 'surfaces.id', '=', 'surface_products.surface_id')
				->join('category_products', 'products.id', '=', 'category_products.product_id')
				->join('categories', 'categories.id', '=', 'category_products.category_id')
				->join('size_products', 'products.id', '=', 'size_products.product_id')
				->join('sizes', 'sizes.id', '=', 'size_products.size_id')
				->distinct()
				->where('products.language', getLanguage())
				->where('products.status', ACTIVE);

			if($origin) {
				$products = $products->where('products.origin_id', $origin->id);
			}

			if(isset($input['category'])) {
				$products = $products->whereIn('category_products.category_id', $input['category']);
			}
			if(isset($input['material'])) {
				$products = $products->whereIn('materials.id', $input['material']);
			}
			if(isset($input['surface'])) {
				$products = $products->whereIn('surface_products.surface_id', $input['surface']);
			}
			if(isset($input['size'])) {
				$products = $products->whereIn('size_products.size_id', $input['size']);
			}

			$products =	$products->orderByRaw("products.weight_number = '0', products.weight_number")
				->orderBy('products.id', 'desc')
				->paginate(FRONENDPAGINATE);
			$title = trans('messages.result_search');
			$data = $origin;
			return View::make('site.product.list')->with(compact('products', 'title', 'data'));
		}
		dd(123);
	}

}
