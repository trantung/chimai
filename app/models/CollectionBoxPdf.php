<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CollectionBoxPdf extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'collection_box_pdf';
    protected $fillable = ['pdf_id', 'box_collection_id'];
    protected $dates = ['deleted_at'];

    public function boxcollection() 
    {
        return $this->belongsTo('BoxCollection', 'box_collection_id', 'id');
    }

    public function pdf() 
    {
        return $this->belongsTo('AdminPdf', 'pdf_id', 'id');
    }
}