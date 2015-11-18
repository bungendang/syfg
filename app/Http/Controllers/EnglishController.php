<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnglishController extends Controller
{
    public function index()
    {
	    return view('en/home');
    }
    public function terhahLang()
    {
    	return view('en/terhah-lang');
    }
    public function works(Request $request)
    {
    	$url = 'http://wptepu.dev/wp-json/wp/v2/posts?filter[category_name]=karya';
    	$json = file_get_contents($url);
    	$query = json_decode($json);
    	//var_dump($query[0]->date);
    	$iteration = count($query);
    	//var_dump($iteration);

    	$karya = array();
    	for ($i=0; $i < $iteration; $i++) { 
    		$karya[] = array('judul' => $query[$i]->title->rendered, 'slug'=>$query[$i]->slug );
    	}
//    	var_dump($karya);

    	//return $judulKarya;

    	//var_dump($query[0]['id']);
    	//var_dump($query[0]);

    	//return $query ;
    	return view('en/works');
    }
    public function worksTitle($slug){
    	$url = 'http://wptepu.dev/wp-json/wp/v2/posts?filter[name]='.$slug;
    	$json = file_get_contents($url);
    	$query = json_decode($json);
    	//return $query;
    	return view('en/work-by-slug')->with(['data'=>$query[0]]);
    }
}
