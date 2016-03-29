<?php

class AdminContactController extends AdminController {

	
	public function index()
	{
		$data = Contact::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.contact.index')->with(compact('data'));
	}

	public function destroy($id)
	{
		Contact::find($id)->delete();
        return Redirect::action('AdminContactController@index')->with('message', 'Đã xóa');
	}

	public function deleteSelected()
	{
		$ids = Input::get('id');
		if($ids) {
			foreach($ids as $key => $value) {
				$data = Contact::find($value);
				if($data) {
					$data->delete();
				}
			}
		}
		dd(1);
	}


}
