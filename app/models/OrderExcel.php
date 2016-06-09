<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class OrderExcel extends Eloquent
{
    protected $table = 'order_excels';
    protected $fillable = ['order_id', 'file'];

}