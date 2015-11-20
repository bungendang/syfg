<?php

namespace Syfg\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $url = 'http://wptepu.dev/wp-json/posts?filter[posts_per_page]=-1&filter[category_name]=karya';
        $json = file_get_contents($url);
        $query = json_decode($json);
        //var_dump($query[0]->date);
        $iteration = count($query);
        //var_dump($iteration);

        $karya = array();
        for ($i=0; $i < $iteration; $i++) { 
            $karya[] = array('judul' => $query[$i]->title, 'slug'=>$query[$i]->slug );
        }
        $countKarya = count($karya);
        view()->share(['karya'=>$karya,'countKarya'=>$countKarya]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
