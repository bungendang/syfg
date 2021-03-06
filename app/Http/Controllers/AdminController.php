<?php

namespace Syfg\Http\Controllers;

use Syfg\Terhah;
use Syfg\Indonesian;
use Syfg\English;
use Syfg\ThtoId;
use Syfg\ThtoEn;
use Syfg\Files;
use File;

use DB;

use Illuminate\Http\Request;

use Syfg\Http\Requests;
use Syfg\Http\Controllers\Controller;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin/dashboard');
    }
    public function translate()
    {
        return view('admin/translate');
    }
    public function drive()
    {
        $getFile = Files::all();
        //return $getFile;
  //      $imagick = new imagick('/files/ef8103516cbb4a5297d7db9789015a01.pdf[0]'); // 0 specifies the first page of the pdf

//$imagick->setImageFormat('jpg'); // set the format of the output image
//header('Content-Type: image/jpeg'); // set the header for the browser to understand
//echo $imagick; // display the image
        return view('admin/drive')->with('files',$getFile);
    }

    public function driveGetUpload()
    {
//        return 'Upload file';
        $getFile = Files::all();
        return $getFile;
        //return view('admin/upload-file');
    }
    public function drivePostUpload(Request $request)
    {
        //return $request->all();
        
        $extension = $request->file('file')->getClientOriginalExtension();
        $filename = $request->file('file')->getClientOriginalName();
            //$filename->move('files',$filename);
        $destinationPath = 'files';
        $request->file('file')->move($destinationPath, $filename);
        

        //input file title and url
        $file = new Files;
        $file->title = $request->title;
        $file->url = '/'.$destinationPath.'/'.$filename;
        $file->save();
        //endinput
        //return $request;
        //return redirect()->route('admin.getUploadFile');
        return 'test upload file';
    }



    public function getDriveEdit($id){
        $data = Files::find($id);

        return view('admin/edit-drive')->with('data',$data);
    }
    public function postDriveEdit(Request $request,$id){
        $data = Files::find($id);
        $data->title = $request->title;
        $data->comment = $request->note;
        $data->save();
        return redirect()->action('AdminController@drive');
    }

    public function postDriveDelete($id){
        $data = Files::find($id);

   //     return $data->url;

        File::delete(public_path().$data->url);
       $data->delete();

        return back()->withInput();
    }

    public function terhahGetAll()
    {
        $terhahs = Terhah::orderBy('word','asc')->get();
        $indonesian = Indonesian::all();
        $english = English::all();
        $thid = ThtoId::all();
        $then = ThtoEn::all();
        //return $terhah;
        //$indonesian = Terhah::find(1)->indonesian;
        //$english = Terhah::find(2)->english;
        $word_in_english = DB::table('th_to_eng')
        ->leftJoin('english','th_to_eng.english_id','=','english.id')
        ->select('english.id','th_to_eng.terhah_id','english.word')
        ->get();
        $word_in_indonesian = DB::table('th_to_ina')
        ->leftJoin('indonesians','th_to_ina.indonesian_id','=','indonesians.id')
        ->select('indonesians.id','th_to_ina.terhah_id','indonesians.word')
        ->get();
        //return $word_in_indonesian;
//return $word_in_english;
        $data = array();
        foreach ($terhahs as $key => $terhah) {
            //unset($terhah->english);
            $kata_english = array();
            foreach ($word_in_english as $key => $wie) {
                if ($wie->terhah_id == $terhah->id) {
                    $kata_english[] = $wie->word;
                }else{
                    unset($terhah->english);
                }
                $terhah->english = $kata_english;
            }
            $kata_indonesian = array();
            foreach ($word_in_indonesian as $key => $wii) {
                if ($wii->terhah_id == $terhah->id) {
                    $kata_indonesian[] = $wii->word;
                } else {
                    unset($terhah->indonesian);
                }
                $terhah->indonesian = $kata_indonesian;
            }
          //  echo $terhah;
            $data[] = $terhah;
        }
       // var_dump($data);
        
        //var_dump($data);
       //dd($kata_english);
//        var_dump($terhah);
//       return $data;
        //return $english;

        return view('admin/terhah-all',['terhah'=>$data]);
    }
    public function terhahPostAdd(Request $request)
    {
//        dd($request->all());
        //save terhah word and spelling
        $terhah = new Terhah;
        $terhah->word = $request->word;
        $terhah->spelling = $request->spelling;
        $terhah->save();
        //endsave

        //save id word
        $indonesian = $request->idWord;
        $arrayId = explode(";", $indonesian);
        foreach ($arrayId as $key => $id) {
            //echo $id;
            //echo "<br>";

            $indonesian_added = new Indonesian;
            $indonesian_added->word = ltrim($id);
            $indonesian_added->save();
            //save terhahToId
            $thtoid = new ThtoId;
            $thtoid->terhah_id = $terhah->id;
            $thtoid->indonesian_id = $indonesian_added->id;
            $thtoid->save();
            //endsave
        }
        //endsave
        //save en word
        $english = $request->enWord;
        $arrayEn = explode(";", $english);
        //var_dump($array);
        foreach ($arrayEn as $key => $en) {
            //echo $en;
            //echo "<br>";
            $english_added = new English;
            $english_added->word = ltrim($en);
            $english_added->save();
            //save terhahToEn
            $thtoen = new ThtoEn;
            $thtoen->terhah_id = $terhah->id;
            $thtoen->english_id = $english_added->id;
            $thtoen->save();
            //endsave
        }
        //endsave



        //return '$request->enWord';
//        $indonesian = new Indonesian;
//        $indonesian->word = $request->idWord;
//        $data = Terhah::all();
//        return 'berhasil di save gak ya';
        return redirect()->route('admin.terhah');
    }
    public function getEditTerhahId($id){
        $word = Terhah::find($id);
        $indo_id = ThtoId::where('terhah_id',$id)->get();
        $eng_id = ThtoEn::where('terhah_id',$id)->get();
        $data = array();
        $data['id'] = $word->id;
        $data['terhah'] = $word;
        foreach ($indo_id as $key => $iid) {
            
            $indonesian[] = Indonesian::find($iid->indonesian_id);
            //echo $indonesian;
            $data['indonesian'] = $indonesian;
        }
        foreach ($eng_id as $key => $eid) {
            $english[] = English::find($eid->english_id);
            $data['english'] = $english;
        }
//return $data;
       // return $indonesian;
        return view('admin/editTerhah')->with('data',$data);
    }
    public function postEditTerhahId(Request $request, $id){
//return $request->english;
//return $request->all();
        $terhah = Terhah::find($id);
        $terhah->word = $request->word;
        $terhah->spelling = $request->spelling;
        $terhah->save();
  // return $request->all();

        //update data dari kata indonesia yang sudah diimput sebelumnya
        foreach ($request->indonesian as $key => $indo) {
            //var_dump($key);
            $update = Indonesian::find($key);
            $update->word = $indo;
            $update->save();
        }
        //end

        //update data dari kata english yang sudah diimput sebelumnya
        foreach ($request->english as $key => $eng) {
            //var_dump($key);
            $update = English::find($key);
            $update->word = $eng;
            $update->save();
        }
        //end

        //tambah arti kata baru indonesian
        foreach ($request->indoFields as $key => $newIndo) {
            echo $newIndo;
            $check = Indonesian::where('word',$newIndo)->first();
            if ($check === null) {
                //echo 'kata tersebut belum ada';
                $addNewIndo = new Indonesian;
                $addNewIndo->word = $newIndo;
                $addNewIndo->save();
                $addNewThtoId = new ThtoId;
                $addNewThtoId->terhah_id = $id;
                $addNewThtoId->indonesian_id = $addNewIndo->id;
                $addNewThtoId->save();
            } elseif($newIndo == ''){
               // echo 'kata itu sudah ada';
                //echo $addNewIndo->get() ;
                echo 'isinya kosong';

            } else{
                $existingData = Indonesian::where('word','=',$newIndo)->first();
                $addNewThtoId = new ThtoId;
                $addNewThtoId->terhah_id = $id;
                $addNewThtoId->indonesian_id = $existingData->id;
                $addNewThtoId->save();
                var_dump($existingData->id);
            }
        }
        //end
        //tambah arti kata baru english
        foreach ($request->engFields as $key => $newEng) {
//            echo $newIndo;
            $check = English::where('word',$newEng)->first();
            if ($check === null) {
                echo 'kata tersebut belum ada';
                $addNewIndo = new English;
                $addNewIndo->word = $newEng;
                $addNewIndo->save();
                $addNewThtoId = new ThtoEn;
                $addNewThtoId->terhah_id = $id;
                $addNewThtoId->english_id = $addNewIndo->id;
                $addNewThtoId->save();
            } elseif ($newEng == ''){
                echo 'isinya kosong';
            }else{
                echo 'inggris kata itu sudah ada';
                //echo $addNewIndo->get() ;
                $existingData = English::where('word','=',$newEng)->first();
                $addNewThtoId = new ThtoEn;
                $addNewThtoId->terhah_id = $id;
                $addNewThtoId->english_id = $existingData->id;
                $addNewThtoId->save();
                var_dump($existingData->word);                
            }
        }
        //end

        //$indo = Indonesian::find();     

     //   return 'data updated';
        return back()->withInput();
    }
    public function deleteTerhahId($id){

//hapus di table terhah
        $terhah = Terhah::find($id);
        $terhah->delete();
//end

//hapus di table thtoina
        $th_to_ina = ThtoId::where('terhah_id',$id)->get();
        foreach ($th_to_ina as $key => $thina) {
            echo $thina->id;
            ThtoId::find($thina->id)->delete();
        }
//        return $th_to_ina;
//end
//hapus di table thtoeng
        $th_to_eng = ThtoEn::where('terhah_id',$id)->get();
        foreach ($th_to_eng as $key => $theng) {
            echo $theng;
            ThtoEn::find($theng->id)->delete();
        }
        
//end

        //return 'kata terhah sudah di hapus';
        return redirect()->route('admin.terhah');
    }
     public function deleteIndonesianId($id, $thid){

//hapus di table terhah
        //$indonesian = Indonesian::find($id);
        //$indonesian->delete();
//end

//hapus di table thtoina
        $th_to_ina = ThtoId::where('indonesian_id',$id)->where('terhah_id',$thid)->delete();
//end

        //return 'kata terhah sudah di hapus';
        return back()->withInput();
    }
     public function deleteEnglishId($id, $thid){

//hapus di table terhah
        //$indonesian = English::find($id);
        //$indonesian->delete();
//end

//hapus di table thtoina
        $th_to_ina = ThtoEn::where('english_id',$id)->where('terhah_id',$thid)->delete();
//end

        //return 'kata terhah sudah di hapus';
        return back()->withInput();
    }
}
