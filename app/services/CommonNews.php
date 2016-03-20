<?php
class CommonNews
{
	public static function searchNews($input)
	{
		$data = AdminNew::where(function ($query) use ($input)
		{
			if ($input['type_new_id'] != 0) {
				$query = $query->where('type_new_id', $input['type_new_id']);
			}
			if ($input['title']) {
				$query = $query->where('title', 'like', '%'.$input['title'].'%');
			}
			// if($input['start_date'] != ''){
			// 	$query = $query->where('start_date', '>=', $input['start_date']);
			// }
			// if($input['end_date'] != ''){
			// 	$query = $query->where('start_date', '<=', $input['end_date']);
			// }
			
		})->orderBy('created_at', 'desc')->paginate(PAGINATE);
		return $data;
	}
	
	public static function getTypeNews()
	{
		return TypeNew::where('language', VI)->lists('name', 'id');
	}

}