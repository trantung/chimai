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
		if (is_int($v)) {
			return false;
		}
	}
	return true;
});
Validator::extend('greater_than', function($attribute, $value, $parameters)
{
    if (isset($parameters[1])) {
       $other = $parameters[1];
       return intval($value) > intval($other);
    } 
    else {
      return true;
   }
});
Validator::extend('youtube_url', function($attribute, $value, $parameters)
{
	$rx = '~
    ^(?:https?://)?              # Optional protocol
     (?:www\.)?                  # Optional subdomain
     (?:youtube\.com|youtu\.be)  # Mandatory domain name
     /watch\?v=([^&]+)           # URI with video id as capture group 1
     ~x';

	$has_match = preg_match($rx, $value, $matches);
	if($has_match) {
		return true;
	}
	return false;

});
