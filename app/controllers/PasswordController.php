<?php

class PasswordController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('site.user.forgot_password');
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

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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

	public function changePass()
	{
		$encoded = Input::get('param');
		$decoded = base64_decode(urldecode( $encoded ));
		$data = json_decode($decoded);
		$user = User::where('email', $data->email)->first();
		if(is_null($user)){
			return Redirect::action('SiteController@login')->with('error', 'Thông tin sai!');
		}else{
			if($data->new_password != $data->re_password){
				return Redirect::action('SiteController@login')->with('error', 'Password không giống nhau!');
			}
			else{
				$user->password = Hash::make($data->new_password);
				$user->save();
			}
		}
		return Redirect::action('SiteController@login')->with('message', 'Đổi mật khẩu thành công, mời login!');
	}

}
