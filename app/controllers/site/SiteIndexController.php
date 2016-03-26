<?php

class SiteIndexController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menu = BoxCommon::where('position', MENU)
			->where('status', ENABLED)
			->get();
		$content = BoxCommon::where('position', CONTENT)
			->where('status', ENABLED)
			->get();
		$footer = BoxCommon::where('position', FOOTER)
			->where('status', ENABLED)
			->get();
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
			$boxType = $object['model_object'];
			$data = TypeNew::where('box_type_id', $boxType->id)
				->where('status', ACTIVE)
				->orderBy('weight_number', 'asc')
				->take(TAKE_NUMBER_BOX_TYPE)
				->get();
			return View::make('site.about.index')->with(compact('data'));
		}
		if ($object['model_name'] == 'TypeNew') {
			$data = AdminNew::where('type_new_id', $object['model_object']->id)
				->where('status', ACTIVE)
				->orderBy('weight_number', 'asc')
				->paginate(FRONENDPAGINATE);
			return View::make('site.news.list')->with(compact('data'));
		}
		dd(1);
	}
	public function slugChild($slug, $slugChild)
	{	
		dd(1);
		//from $slug to get model_name and model_id in the menus table
		$menu = Menu::findBySlug($slug);
		if (empty($menu)) {
			return Redirect::action('SiteIndexController@404');
		}
		if ($menu->model_name == 'AboutUs') {
			return Redirect::action('SiteIndexController@aboutUs');
		}
		if ($menu->model_name == 'Contact') {
			return Redirect::action('SiteIndexController@contact');
		}
		return Redirect::action('SiteIndexController@typeNew');
	}

	public function sendLang()
	{
		$input = Input::all();
		if ($input['lang'] == $input['lang_current']) {
			return $input['url'];
		}
		else{
			if($input['lang_current'] == 'vi') {
				if($input['link_url'] == 'gioi-thieu') {
					return url('/en/about');
				}
				if($input['link_url'] == 'lien-he') {
					return url('/en/contact');
				}
				if(!empty($input['link_url'])) {
					$type = TypeNew::findBySlug($input['link_url']);
					if(!empty($type)) {
						$obj = Common::objectLanguage2('TypeNew', $type->id, LANG_VI);
						$slug = $obj->slug;
					}
				} else {
					$slug = '';
				}
				if(!empty($input['link_url2'])){
					$news = AdminNew::findBySlug($input['link_url2']);
					if(!empty($news)) {
						$obj = Common::objectLanguage2('AdminNew', $news->id, LANG_VI);
						$slugChild = $obj->slug;
					}
				} else {
					$slugChild = '';
				}
				return url('/en/'.$slug.'/'.$slugChild);
			}
			if($input['lang_current'] == 'en') {
				if($input['link_url'] == 'about') {
					return url('/vi/gioi-thieu');
				}
				if($input['link_url'] == 'contact') {
					return url('/vi/lien-he');
				}
				if(!empty($input['link_url'])) {
					$type = TypeNew::findBySlug($input['link_url']);
					if(!empty($type)) {
						$obj = Common::objectLanguage2('TypeNew', $type->id, LANG_EN);
						$slug = $obj->slug;
					}
				} else {
					$slug = '';
				}
				if(!empty($input['link_url2'])){
					$news = AdminNew::findBySlug($input['link_url2']);
					if(!empty($news)) {
						$obj = Common::objectLanguage2('AdminNew', $news->id, LANG_EN);
						$slugChild = $obj->slug;
					}
				} else {
					$slugChild = '';
				}
				return url('/vi/'.$slug.'/'.$slugChild);
			}
		}
	}


}
