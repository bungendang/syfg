<?php

namespace Syfg\Http\Controllers;

use Illuminate\Http\Request;

use Syfg\Http\Requests;
use Syfg\Http\Controllers\Controller;

use Syfg\Files;

class ApiController extends Controller
{
    public function fileAll()
    {
        return view('admin/test');
    }
    public function postUploadFile(Request $request){
    	$extension = $request->file('file')->getClientOriginalExtension();
        $filename = md5($request->file('file')->getClientOriginalName() . time()).'.'.$extension;
            //$filename->move('files',$filename);
        $destinationPath = 'files';
        $request->file('file')->move($destinationPath, $filename);
        
        //return $extension;
        $file = new Files;
        $file->title = $request->title;
        $file->comment = $request->note;
        $file->url = '/'.$destinationPath.'/'.$filename;
        $file->save();
        return back()->withInput();
    	return $request->all();
    	return 'test upload';
    }
    public function getDriveEdit($id){
        $data = Files::find($id);

        return $data;
    }
}
