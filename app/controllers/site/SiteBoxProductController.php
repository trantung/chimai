<?php

class SiteBoxProductController extends SiteController {

	public function index()
	{
		return View::make('site.product.list');
	}

	public function detail()
	{
		return View::make('site.product.detail');
	}

}
