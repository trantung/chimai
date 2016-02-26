<?php
class NewsManager
{
	public static function searchNews($input)
	{
		$orderBy = self::searchAdminGameSortBy($input);
		$data = AdminNew::where(function ($query) use ($input)
		{
			if ($input['type_new_id'] != 0) {
				$query = $query->where('type_new_id', $input['type_new_id']);
			}
			if ($input['title']) {
				$query = $query->where('title', 'like', '%'.$input['title'].'%');
			}
			if($input['start_date'] != ''){
				$query = $query->where('start_date', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('start_date', '<=', $input['end_date']);
			}
			if($input['status_seo'] != '')
			{
				$listSeo = AdminSeo::where('model_name', 'AdminNew')->where('status_seo', $input['status_seo'])->lists('model_id');
                $query = $query->whereIn('id', $listSeo);
			}
			if ($input['position'] != '') {
				$query = $query->where('position', $input['position']);
			}


		})->orderBy($orderBy[0], $orderBy[1])->paginate(PAGINATE);
		return $data;
	}
	public static function searchAdminGameSortBy($input)
	{
		$sortBy = 'id';
		$sort = 'desc';
		if($input['sortByCountView'] != '') {
			if($input['sortByCountView'] == 'count_view_asc') {
				$sortBy = 'count_view';
				$sort = 'asc';
			}
			if($input['sortByCountView'] == 'count_view_desc') {
				$sortBy = 'count_view';
				$sort = 'desc';
			}
		}
		return [$sortBy, $sort];
	}

	public static function getHomeNews($typeId = null)
	{
		if(getDevice() == MOBILE) {
			$limit = HOME_MOBILE_PAGINATE;
			$offset = LIMIT_HIGHTLIGHT_MOBILE;
		} else {
			$limit = HOME_PAGINATE;
			$offset = LIMIT_HIGHTLIGHT_PC;
		}
		$data = AdminNew::join('type_news', 'news.type_new_id', '=', 'type_news.id')
				->select('news.id as id', 'news.slug as slug', 'type_news.slug as slugType', 'type_news.name as nameType', 'news.title as title', 'news.description as description', 'news.image_url as image_url')
				->where('news.start_date', '<=', Carbon\Carbon::now())
				->where('type_news.status', ENABLED);
		if($typeId) {
			$data = $data->where('news.type_new_id', $typeId);
		}
		$data = $data->orderBy('news.start_date', 'desc')
				->orderBy('news.weight_number', 'asc')
				->limit($limit)
				->offset($offset)
				->get();
		return $data;
	}

	public static function getNewsHighlight($typeId = null)
	{
		if(getDevice() == MOBILE) {
			$limit = LIMIT_HIGHTLIGHT_MOBILE;
		} else {
			$limit = LIMIT_HIGHTLIGHT_PC;
		}
		$data = AdminNew::join('type_news', 'news.type_new_id', '=', 'type_news.id')
				->select('news.id as id', 'news.slug as slug', 'type_news.slug as slugType', 'type_news.name as nameType', 'news.title as title', 'news.description as description', 'news.image_url as image_url')
				->where('news.start_date', '<=', Carbon\Carbon::now())
				->where('type_news.status', ENABLED);
		if($typeId) {
			$data = $data->where('news.type_new_id', $typeId);
		}
		$data = $data->orderBy('news.start_date', 'desc')
				->orderBy('news.weight_number', 'asc')
				->limit($limit)
				->get();
		return $data;
	}

}