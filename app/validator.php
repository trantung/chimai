<?php
Validator::extend('unique_delete', function($attribute, $value, $parameters)
{
	if (Admin::where('username', $value)->first()) {
		return false;
	}
	return true;
});
Validator::extend('array_number', function($attribute, $value, $parameters)
{
	foreach ($value as $k => $v) {
		if (is_int($v) || $v <= 0) {
			return false;
		}
	}
	return true;
});

