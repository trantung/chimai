<?php

class SiteBoxCollectionController extends SiteController {

	public function collection()
	{
		return View::make('site.catalogue.collection');
	}
	
	public function catalogue()
	{
		return View::make('site.catalogue.catalogue');
	}

	public function gallery()
	{
		return View::make('site.catalogue.gallery');
	}
	
	public function video()
	{
		return View::make('site.catalogue.video');
	}

}
