<?php

namespace Syfg\Http\Controllers;

use Illuminate\Http\Request;

use Syfg\Http\Requests;
use Syfg\Http\Controllers\Controller;

use Syfg\Files;
use Syfg\Terhah;
use Syfg\Indonesian;
use Syfg\English;
use Syfg\ThtoId;
use Syfg\ThtoEn;

use DateTime;

use PDF;

use DB;

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
    public function getAllTerhah(){
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
    return response()->json(['results'=>$data]);
    }
    public function showTerhahDictionary(){
        //return public_path('css/');
$dt = new DateTime();
$tanggal = $dt->format('d-m-Y');
$data = json_decode(file_get_contents('http://admin.syaifulgaribaldi.com/api/terhahs'));
$pdf = PDF::loadView('pdf.dictionary',['tanggal'=>$tanggal,'data'=>$data->results]);
//$pdf->loadHTML('<h1>Test</h1>');

return $pdf->stream();
//return $pdf->download('terhah-dictionary-'.$tanggal.'.pdf');
//return view('pdf.dictionary')->with('tanggal',$tanggal)->with('data',$data->results);
        //return 'hehe';
    }
}
