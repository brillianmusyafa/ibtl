<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Str;

class Upload extends Model
{
    // handle upload file
	public function upload($input,$path){
		$file = $input['file'];

		$data_upload['name'] = $file->getClientOriginalName();
		$data_upload['ext'] = $file->getClientOriginalExtension();
		$data_upload['path'] = $file->getRealPath();
		$data_upload['size'] = $file->getSize();
		$data_upload['mime'] = $file->getMimeType();

    	// move file
		if($data_upload['size'] >= 20*1024*1024){
			return ['success'=>false,'msg'=>'File terlalu besar'];
		}

    	// check nama file
		$fullpath = $path.'/'.$data_upload['name'];
		if(File::exists($fullpath)){
			$rand = str_random(2);
    		// jika ada, ubah dengan nama yang lain
			$data_upload['name'] = $rand.$data_upload['name'];
		}
		$pindah = $file->move($path,$data_upload['name']);

		return ['success'=>true,'nama_file'=>$data_upload['name']];		
	}

	public function nama_file($nama){

	}
}
