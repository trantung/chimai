<?php

class SiteController extends BaseController {

	public function __construct() {
		$menu = BoxCommon::where('position', MENU)
			->where('status', ENABLED)
			->orderBy('weight_number', 'asc')
			->get();
		$content = BoxCommon::where('position', CONTENT)
			->where('status', ENABLED)
			->orderBy('weight_number', 'asc')
			->get();
		$footer = BoxCommon::where('position', FOOTER)
			->where('status', ENABLED)
			->orderBy('weight_number', 'asc')
			->get();

		if (Cache::has(SEO_DEFAULT)) {
            $seoDefault = Cache::get(SEO_DEFAULT);
        } else {
        	$seoDefault = AdminSeo::whereNull('model_id')->where('model_name', SEO_DEFAULT)->first();
            Cache::put(SEO_DEFAULT, $seoDefault, CACHETIME);
        }
		if(isset($seoDefault)) {
			View::share('script', $seoDefault);
		}

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
    	return View::make('site.user.login');
    	
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
            'user_name'   => 'required',
            'password'   => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::action('SiteController@login')
                // ->withErrors($validator);
            	->with('error', 'Sai tên truy cập hoặc mật khẩu');
        } else {
            if(Auth::user()->attempt($input)) {
            	if(Auth::user()->get()->status == INACTIVE) {
            		dd('Tài khoản của bạn đã bị khóa');
            	}
            	$inputUser = CommonSite::ipDeviceUser();
            	CommonNormal::update(Auth::user()->get()->id, $inputUser, 'User');
        		return Redirect::action('SiteIndexController@index');
            }
            else {
                return Redirect::action('SiteController@login')->with('error', 'Sai tên truy cập hoặc mật khẩu');
            }
        }
    }

    public function logout()
    {
    	return View::make('site.user.login');

    	$checkLogin = CommonSite::isLogin();
        if($checkLogin) {
        	Auth::user()->logout();
	        //Session::flush();
	        return Redirect::action('SiteController@login');
        } else {
            return Redirect::action('SiteIndexController@index');
        }
    }

}
