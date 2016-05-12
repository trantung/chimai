<?php

class SiteContactController extends SiteController {

	public function index()
	{
		return View::make('site.contact.index');
	}

	public function contact()
	{
		$rules = CommonRule::getRules('Contact');
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SiteContactController@index')
	            ->with('error', trans('messages.required'));
        } else {
			$id = Contact::create($input)->id;
			if($id) {
				return Redirect::action('SiteContactController@index')->with('message', trans('messages.success'));
			}
			return Redirect::action('SiteContactController@index')->with('message', trans('messages.failure'));
		}
	}

	public function newsletter()
	{
		return View::make('site.contact.newsletter');
	}

	public function newsletterSend()
	{
		$rules = ['email' => 'required|email'];
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SiteContactController@newsletter')
	            ->with('error', trans('messages.required'));
        } else {
			$id = Contact::create($input)->id;
			if($id) {
				return Redirect::action('SiteContactController@newsletter')->with('message', trans('messages.success'));
			}
			return Redirect::action('SiteContactController@newsletter')->with('message', trans('messages.failure'));
		}
	}

	public function recruitment()
	{
		return View::make('site.contact.recruitment');
	}

	public function recruitmentPost()
	{
		$rules = array(
				'name' => 'required',
				'email' => 'required|email',
				'phone' => 'required',
				'file_upload' => 'mimes:pdf,doc,docx,xslx,xsl,csv|max:20000',
			);
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SiteContactController@recruitment')
	            ->with('error', trans('messages.required'));
        } else {
			$id = Contact::create($input)->id;
			//send mail

			if($id) {
				return Redirect::action('SiteContactController@recruitment')->with('message', trans('messages.success'));
			}
			return Redirect::action('SiteContactController@recruitment')->with('message', trans('messages.failure'));
		}
	}

}
