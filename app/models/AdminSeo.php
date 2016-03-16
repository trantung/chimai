<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminSeo extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'seos';
    protected $fillable = ['model_name', 'model_id', 'title_site', 'description_site', 'keyword_site', 
		'header_script','footer_script'];
    protected $dates = ['deleted_at'];

}