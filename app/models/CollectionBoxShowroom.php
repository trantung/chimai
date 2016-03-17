<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CollectionBoxShowroom extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'collection_box_showrooms';
    protected $fillable = ['box_show_room_id', 'box_collection_id'];
    protected $dates = ['deleted_at'];
}