<?php

class SiteOrdersController extends SiteController {

	public function orders()
	{
		return View::make('site.user.orders');
	}
	
	public function orders_detail()
	{
		return View::make('site.user.orders_detail');
	}

}
