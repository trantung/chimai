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

	public static function searchTypeNew($input)
	{
		$data = TypeNew::where(function ($query) use ($input)
		{
			if ($input['name']) {
				$query = $query->where('name', 'like', '%'.$input['name'].'%');
			}
		})
		->where('language', VI)
		->orderBy('created_at', 'desc')->paginate(PAGINATE);
		return $data;
	}
	
	public static function getTypeNews()
	{
		return TypeNew::where('language', VI)->lists('name', 'id');
	}

	public static function getSideTypeNews()
	{
		$data = TypeNew::join('box_types', 'type_news.box_type_id', '=', 'box_types.id')
				->select('type_news.id as id', 'type_news.name as name', 'type_news.slug as slug', 'box_types.slug as slugType')
				->where('type_news.status', ACTIVE)
				->where('type_news.language', getLanguage())
				->orderByRaw(DB::raw("type_news.weight_number = '0', type_news.weight_number"))
				->orderBy('type_news.id', 'desc')
				->take(NUMBER_NEWS_SIDEBAR)
				->get();
		if(count($data) > 0) {
			return $data;
		} else {
			return null;
		}
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