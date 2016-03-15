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
		$validator = Validator::make($input,$rules);
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
		$rules = ['email' => 'required'];
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
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

}
