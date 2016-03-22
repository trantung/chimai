<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxCollection extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
    protected $table = 'box_collections';
    protected $fillable = ['name_menu', 'name_content', 'weight_number',
    	'status', 'position', 'image_url', 'slug', 'name_footer', 'language'];
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'name_menu',
        'save_to'    => 'slug',
    );
    public function boxPdfs() 
    {
        return $this->belongsToMany('BoxPdf', 'collection_box_pdf', 'box_collection_id', 'pdf_id');
    }
    public function boxVideos() 
    {
        return $this->belongsToMany('BoxVideo', 'collection_box_videos', 'box_collection_id', 'video_id');
    }
    public function boxShowRooms() 
    {
        return $this->belongsToMany('BoxShowRoom', 'collection_box_showrooms', 'box_collection_id', 'box_show_room_id');
    }
}