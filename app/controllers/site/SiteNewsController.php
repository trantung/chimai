<?php

class SiteNewsController extends SiteController {

	public function index()
	{
		return View::make('site.news.list');
	}

	public function detail()
	{
		return View::make('site.news.detail');
	}

}
