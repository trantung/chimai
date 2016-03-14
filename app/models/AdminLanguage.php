<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminLanguage extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'languages';
    protected $fillable = ['model_id', 'model_name', 'relate_id',
    	'relate_name', 'status', 'weight_number'];
    protected $dates = ['deleted_at'];
}