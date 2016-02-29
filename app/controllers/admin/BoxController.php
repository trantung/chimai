<?php

class BoxController extends AdminController {

	public function boxDelete($modelName, $id)
	{
		$delete = $modelName::find($id);
		$delete->destroy($id);
		return true;
	}

}
