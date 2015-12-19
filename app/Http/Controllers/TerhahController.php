<?php

namespace Syfg\Http\Controllers;

use Illuminate\Http\Request;

use Syfg\Http\Requests;
use Syfg\Http\Controllers\Controller;
use WpApi;

class TerhahController extends Controller
{
    public function index()
    {
//       $posts = WpApi::category_posts('karya');
 //      return $posts;
        
        return view('th/home');
    }
    public function terhahLang()
    {
        return view('th/terhah-lang');
    }
    public function works(Request $request)
    {
        $url = 'http://wp.syaifulgaribaldi.com/wp-json/posts?filter[posts_per_page]=-1&filter[category_name]=karya';
        $json = file_get_contents($url);
        $query = json_decode($json);
        //var_dump($query[0]->date);
        $iteration = count($query);
        //var_dump($iteration);

        $karya = array();
        for ($i=0; $i < $iteration; $i++) { 
            $karya[] = array('judul' => $query[$i]->title, 'slug'=>$query[$i]->slug );
        }
//      var_dump($karya);

        //return $judulKarya;

        //var_dump($query[0]['id']);
        //var_dump($query[0]);

        //return $query ;
        return view('th/works');
    }
    public function worksTitle($slug){
        $url = 'http://wp.syaifulgaribaldi.com/wp-json/posts?filter[name]='.$slug;
        $json = file_get_contents($url);
        $query = json_decode($json);
        //return $query;
        return view('th/work-by-slug')->with(['data'=>$query[0]]);
    }
    public function bio(){
        $dataSolo = WpApi::tag_posts('solo-exhibition');
        $dataGroup = WpApi::tag_posts('group-exhibition');
        
        $query = $dataSolo['results'];
        $query2 = $dataGroup['results'];

        foreach ($query as $key => $value) {
            $customField = WpApi::postMeta($value['ID']);
            $queryCustom = $customField['results'];

            $soloExh[] = array(['judul'=>$value['title'],'tahun'=>date('Y',strtotime($value['date'])),'tempat'=>$queryCustom]);
        }
        foreach ($query2 as $key => $value) {
            $customField = WpApi::postMeta($value['ID']);
            $queryCustom = $customField['results'];

            $groupExh[] = array(['judul'=>$value['title'],'tahun'=>date('Y',strtotime($value['date'])),'tempat'=>$queryCustom]);
        }
        return view('th/bio')->with(['solos'=>$soloExh,'groups'=>$groupExh]);
    }
    public function publication(){
        $dataPublication = WpApi::category_posts('publication', -1);
        $query = $dataPublication['results'];
        foreach ($query as $key => $value) {
            $customField = WpApi::postMeta($value['ID']);
            $queryCustom = $customField['results'];
            $publication[] = array('judul' => $value['title'],'tanggal'=>$value['date'], 'info'=>$queryCustom );
        }
        return view('th/publication')->with('publications' , $publication);
    }
    public function contact(){
        return view('th/contact');
    }
}