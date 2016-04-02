<?php
class CommonSearch
{
	//User search
	public static function seachUser($input){
		$data = User::where(function ($query) use ($input)
		{
			if($input['user_name'] != '') {
				$listGame = $query->where('user_name', 'like', '%'.$input['user_name'].'%');
			}

			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date'].' 23:59:59');
			}
			if($input['from_update_at'] != ''){
				$query = $query->where('updated_at', '>=', $input['from_update_at']);
			}
			if($input['to_update_at'] != ''){
				$query = $query->where('updated_at', '<=', $input['to_update_at']);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

	public static function searchNews($input, $paginate = null)
	{
		$data = AdminNew::join('type_news', 'news.type_new_id', '=', 'type_news.id')
				->select('news.id as newId', 'news.slug as slug', 'type_news.slug as slugType', 'news.name as name', 'news.description as description', 'news.image_url as image_url')
				->where(function ($query) use ($input)
				{
					if($input['search'] != '') {
						$inputSlug = convert_string_vi_to_en($input['search']);
						$inputSlug = strtolower( preg_replace('/[^a-zA-Z0-9]+/i', '-', $inputSlug) );
						$query = $query->where('news.slug', 'like', '%'.$inputSlug.'%');
					}
			});
		$data = $data->where('start_date', '<=', Carbon\Carbon::now());
		if(!$paginate) {
			$data = $data->limit(SEARCHLIMIT)
				->get();
		} else {
			$data = $data->paginate(SEARCH_PAGINATE);
		}
		return $data;
	}

}
