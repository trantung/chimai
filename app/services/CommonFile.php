<?php

class CommonFile
{
	public static function uploadPdf($id, $path, $filePdf, $currentFile = NULL)
	{
		$destinationPath = public_path().'/'.$path.'/'.$id.'/';
		if(Input::hasFile($filePdf)){
			$file = Input::file($filePdf);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			AdminPdf::find($id)->update(['file' => $filename]);
			$listId = Common::getRelatedId('AdminLanguage', 'AdminPdf', $id);
			foreach($listId as $key => $value) {
				AdminPdf::find($value)->update(['file' => $filename]);
			}
			return $filename;
		}
		if ($currentFile) {
			return $currentFile;
		}
	}

}
