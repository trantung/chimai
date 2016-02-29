<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class BoxCommon extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'box_commons';
    protected $fillable = ['model_id', 'model_name', 'relate_id',
    	'relate_name', 'position', 'status', 'weight_number'];
    protected $dates = ['deleted_at'];
}