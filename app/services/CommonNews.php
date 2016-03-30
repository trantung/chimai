<?php
class CommonNews
{
	public static function searchNews($input)
	{
		$data = AdminNew::where(function ($query) use ($input)
		{
			if (isset($input['type_new_id']) && $input['type_new_id'] != 0) {
				$query = $query->where('type_new_id', $input['type_new_id']);
			}
			if ($input['name']) {
				$query = $query->where('name', 'like', '%'.$input['name'].'%');
			}
			// if($input['start_date'] != ''){
			// 	$query = $query->where('start_date', '>=', $input['start_date']);
			// }
			// if($input['end_date'] != ''){
			// 	$query = $query->where('start_date', '<=', $input['end_date']);
			// }
			
		})
		->where('language', VI)
		->orderBy('created_at', 'desc')->paginate(PAGINATE);
		return $data;
	}
	
	public static function getTypeNews()
	{
		return TypeNew::where('language', VI)->lists('name', 'id');
	}

	public static function getSideNews()
	{
		$data = AdminNew::join('type_news', 'news.type_new_id', '=', 'type_news.id')
				->select('news.id as id', 'news.name as name', 'news.slug as slug', 'type_news.slug as slugType')
				->where('news.status', ACTIVE)
				->where('news.language', getLanguage())
				->orderByRaw(DB::raw("news.weight_number = '0', news.weight_number"))
				->orderBy('news.id', 'desc')
				->take(NUMBER_NEWS_SIDEBAR)
				->get();
		if(count($data) > 0) {
			return $data;
		} else {
			return null;
		}
	}

}