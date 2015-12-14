<?php

namespace Syfg\Http\Controllers;

use Syfg\Terhah;
use Syfg\Indonesian;
use Syfg\English;
use Syfg\ThtoId;
use Syfg\ThtoEn;
use Syfg\Files;

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
        return view('admin/drive');
    }

    public function driveGetUpload()
    {
//        return 'Upload file';
        return view('admin/upload-file');
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
        return redirect()->route('admin.getUploadFile');
        return 'test upload file';
    }




    public function terhahGetAll()
    {
        $terhahs = Terhah::all();
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
        foreach ($request->indonesian as $key => $indo) {
            var_dump($key);
            $update = Indonesian::find($key);
            $update->word = $indo;
            $update->save();
        }
        //$indo = Indonesian::find();     

        //return 'data updated';
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
}
