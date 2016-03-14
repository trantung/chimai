<?php

class ConfigCodeController extends BoxController {

	public function editConfig()
	{
		$langs = Common::getArrayLang();
		return View::make('admin.configcode.edit')->with(compact('langs'));
	}

	public function updateConfig()
	{
		// $rules = CommonRule::getRules('ConfigCode');
		$rules = [];
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ConfigCodeController@editConfig')
	            ->withErrors($validator);
        } else {
			//update
			$langs = Common::getArrayLang();
			foreach($langs as $keyLang => $singLang) {
				$code = 'code_'.$singLang;
				if($input[$code]) {
					foreach($input[$code] as $key => $value) {
						ConfigCode::where('language', $singLang)
							->where('type', $key)
							->first()
							->update(['code' => $value]);
					}
				}
				// update other language for: Lat, Long, Chat script
				if($singLang != VI) {
					if($input['code_vi']) {
						ConfigCode::where('language', $singLang)
							->where('type', LAT)
							->first()
							->update(['code' => $input['code_vi'][LAT]]);
						ConfigCode::where('language', $singLang)
							->where('type', LONG)
							->first()
							->update(['code' => $input['code_vi'][LONG]]);
						ConfigCode::where('language', $singLang)
							->where('type', CHAT_SCRIPT)
							->first()
							->update(['code' => $input['code_vi'][CHAT_SCRIPT]]);

					}
				}
			}
			return Redirect::action('ConfigCodeController@editConfig')->with('message', 'Sửa thành công');;
        }
	}

}
