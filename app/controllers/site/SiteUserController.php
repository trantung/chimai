<?php

class SiteUserController extends SiteController {

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
		return View::make('site.user.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'fullname'   => 'required|max:256',
            'password'   => 'required|min:6|max:256',
            'repassword' => 'required|min:6|max:256|same:password',
            'email'      => 'required|email|max:256|unique:users',
            'phone'      => 'required|max:256',
            'address'    => 'max:256',
            'type'       => 'required',
		);
		$input = CommonSite::inputRegister();
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SiteUserController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	// khach le
        	$input['role_user_id'] = 1;
        	$input['username'] = $input['email'];
        	$id = CommonNormal::create($input, 'user');
        	if($id) {
        		return Redirect::action('SiteController@login')->with('message', trans('messages.login_success'));
        	} else {
        		dd('Error');
        	}
        }
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

	public function account()
	{
		if(!CommonSite::isLogin()) {
			return Redirect::action('SiteUserController@create');
		}
		$id = Auth::user()->get()->id;
		$data = User::find($id);
        return View::make('site.user.account', array('data' => $data));
	}

	public function doAccount()
	{
		if(!CommonSite::isLogin()) {
			return Redirect::action('SiteUserController@create');
		}
		$user = Auth::user()->get();
		$id = $user->id;
		$input = Input::except('_method', '_token');

		$rules = User::getRule($input, $user);

		if(Input::get('password')) {
			$rulesPass = array(
				'password'   	=> 'required|min:6|max:256',
				'password_new'  => 'required|min:6|max:256',
				'password_new2' => 'required|min:6|max:256|same:password_new',
	        );
	        $rules = array_merge($rules, $rulesPass);
		}

		// $rules['image_url'] = 'image|mimes:jpg,png,jpeg|max:150';
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SiteUserController@account')
	            ->withErrors($validator)
	            ->withInput(Input::except('password', 'password_new', 'password_new2'));
        } else {
        	if(Input::get('password')) {
        		$input['password'] = Hash::make($input['password_new']);
        	} else {
        		$input = Input::except('_method', '_token','password', 'password_new', 'password_new2');
        	}
        	$input['username'] = $input['email'];
        	// $input['image_url'] = CommonSite::uploadImg(UPLOADIMG, UPLOAD_USER_AVATAR, 'image_url', User::find($id)->image_url);
        	CommonNormal::update($id, $input, 'User');
    		return Redirect::action('SiteUserController@account')->with('message', trans('messages.login_updated'));
        }
	}

}
