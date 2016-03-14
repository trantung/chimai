<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Size extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'sizes';
	protected $fillable = [
		'name', 'weight_number', 'status', 'language'
	];
	protected $dates = ['deleted_at'];
}