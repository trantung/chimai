<?php

use Jenssegers\Agent\Agent;

class BaseController extends Controller {

	public function __construct() {
        //agent check tablet mobile desktop
		$agent = new Agent();
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


}
