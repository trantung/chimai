<?php 

class DiscountController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Discount::orderBy('role_user_id', 'asc')->paginate(PAGINATE);
		return View::make('admin.discount.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.discount.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    	$input = Input::except('_token');
    	$validator = CommonRule::checkRules($input, 'Discount');
		if(isset($validator)) {
			return Redirect::action('DiscountController@create')->withErrors($validator);
		}
		Discount::create($input);		
		return Redirect::action('DiscountController@index')->with('message', 'Tạo mới thành công');
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
		$data = Discount::find($id);
		return View::make('admin.discount.edit')->with(compact('data'));
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
        $validator = CommonRule::checkRules($input, 'Discount');
		if(isset($validator)) {
			return Redirect::action('DiscountController@edit', $id)->withErrors($validator);
		}
		Discount::find($id)->update($input);		
		return Redirect::action('DiscountController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Discount::find($id)->delete();
		return Redirect::action('DiscountController@index')->with('message', 'Đã xóa');
	}

}
