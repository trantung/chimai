<?php
class CommonSearch
{
	//User search
	public static function seachUser($input){
		$data = User::where(function ($query) use ($input)
		{
			if($input['keyword'] != '') {
				$data = $query->where('email', 'like', '%'.$input['keyword'].'%')
					->orWhere('fullname', 'like', '%'.$input['keyword'].'%');
			}
			if ($input['phone'] != '') {
				$data = $query->where('phone', 'like', '%'.$input['phone'].'%');
			}
			if ($input['role_user_id'] != '') {
				$data = $query->where('role_user_id', $input['role_user_id']);
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
