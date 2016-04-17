<?php

class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputUser = User::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.user.index')->with(compact('inputUser'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$rules = User::getRule($input);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('UserController@create')
				->withInput(Input::except('password'))
				->withErrors($validator);
		}
		else {
			User::create($input);
			return Redirect::action('UserController@index');
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
		$user = User::find($id);
		return View::make('admin.user.edit')->with(compact('user'));
	}	
	public function changeStatusUser($id)
	{
		$statusUser = User::find($id);
	
		if($statusUser->status == ACTIVE)
		{
			$input['status'] = INACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}else{
			$input['status'] = ACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}

		return Redirect::action('UserController@index') ;
	}	


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		if ($input['password'] != '') {
			$input['password'] = Hash::make($input['password']);
		}
		$user = User::find($id);
		$rules = User::getRule($input, $user);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('UserController@edit', $id)
				->withInput(Input::except('password'))
				->withErrors($validator);
		}
		else {
			$user->update($input);
			return Redirect::action('UserController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('UserController@index');
	}

	//search data
	public function search()
	{
		$input = Input::all();
		$inputUser = CommonSearch::seachUser($input);
		
		return View::make('admin.user.index')->with(compact('inputUser'));
	}

	//change password
	public function changePassword($id)
	{
		$inputUser = User::find($id);
		return View::make('admin.user.changepassword')->with(compact('inputUser'));
	}

}
