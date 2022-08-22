<?php 
use Illuminate\Support\Facades\DB;


function uploadFiles($request,$file){
    $name = $request->file($file)->getClientOriginalName();
    $path = $request->file($file)->store('public/media');
    $t = explode("/",$path);
    array_shift($t);
    $next = implode("/",$t);
    return $next;
}

function checkDirectory(){
	if (!file_exists(public_path(date("Y"))))
    	mkdir(public_path(date("Y")),0777);
	if (!file_exists(public_path(date("Y").'/'.date("m"))))
	    mkdir(public_path(date("Y").'/'.date("m")),0777);
	return public_path(date("Y/m/"));
}

function deleteFile($files){
	if(is_array($files)){
		foreach ($files as $file) {
			unlink($file);
		}
	}else{
		unlink($files);
	}
}

function createAddButton($route,$text){
    $role = \Auth::user()->role_id;
    if($role == 1){
        echo '<a href="'.$route.'" class="btn btn-primary">Add '.$text.'</a>';
    }else{
        $data = DB::table('permissions')->where('role_id',$role)->first();
        if(isset($data->id) && $data->add ==1){
            echo '<a href="'.$route.'" class="btn btn-primary">Add '.$text.'</a>';
        }else{
            echo false;
        }
    }
}