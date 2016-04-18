<?php

class SiteController extends BaseController {

	public function __construct() {

		$lang = getLanguage();

		// $menu = BoxCommon::where('position', MENU)
		// 	->where('status', ENABLED)
		// 	->orderBy('weight_number', 'asc')
		//  ->orderByRaw(DB::raw("weight_number = '0', weight_number"))
		// 	->get();

		// menu box tin tuc parent_id = 0
		$menu = BoxCommon::select('box_commons.*')
				->join('box_types', 'box_commons.model_id', '=', 'box_types.id')
				// ->distinct()
				->where('box_commons.position', MENU)
				->where('box_commons.status', ENABLED)
				->where('box_types.parent_id', 0)
				->orderByRaw(DB::raw("box_commons.weight_number = '0', box_commons.weight_number"))
				->get();
		$content = BoxCommon::where('position', CONTENT)
			->where('status', ENABLED)
			->orderByRaw(DB::raw("weight_number = '0', weight_number"))
			->get();
		$footer = BoxCommon::where('position', FOOTER)
			->where('status', ENABLED)
			->orderByRaw(DB::raw("weight_number = '0', weight_number"))
			->get();

		// if (Cache::has(SEO_DEFAULT)) {
  //           $seoDefault = Cache::get(SEO_DEFAULT);
  //       } else {
  //       	$seoDefault = AdminSeo::whereNull('model_id')->where('model_name', SEO_DEFAULT)->first();
  //           Cache::put(SEO_DEFAULT, $seoDefault, CACHETIME);
  //       }

        $seoDefault = AdminSeo::whereNull('model_id')->where('model_name', SEO_DEFAULT)->first();
		if(isset($seoDefault)) {
			View::share('script', $seoDefault);
		}

		View::share('lang', $lang);
		View::share('menu', $menu);
		View::share('content', $content);
		View::share('footer', $footer);
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

	public function login()
    {
    	$checkLogin = CommonSite::isLogin();
        if($checkLogin) {
    		return Redirect::action('SiteIndexController@index');
        } else {
            return View::make('site.user.login');
        }
    }

    public function doLogin()
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::action('SiteController@login')
                // ->withErrors($validator);
            	->with('error', trans('messages.login_error'));
        } else {
            if(Auth::user()->attempt($input)) {
            	if(Auth::user()->get()->status == INACTIVE) {
            		return Redirect::action('SiteController@login')
		            	->with('error', trans('messages.login_lock'));
            	}
            	// $inputUser = CommonSite::ipDeviceUser();
            	// CommonNormal::update(Auth::user()->get()->id, $inputUser, 'User');
        		return Redirect::action('SiteIndexController@index');
            }
            else {
                return Redirect::action('SiteController@login')->with('error', trans('messages.login_error'));
            }
        }
    }

    public function logout()
    {
    	$checkLogin = CommonSite::isLogin();
        if($checkLogin) {
        	Auth::user()->logout();
	        //Session::flush();
	        return Redirect::action('SiteController@login');
        } else {
            return Redirect::action('SiteIndexController@index');
        }
    }

    public function page404()
    {
    	return View::make('404');
    }

}
