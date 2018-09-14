<?php

namespace App\Http\Controllers;

use App\Jobs\get_pages;
use App\Jobs\get_sub_pages;
use App\Models\Page;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function crawlerFunction()
    {

        $url = "https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste";
        $domain = "https://www.homegate.ch";


        get_pages::dispatch($url,$domain);

//        dispatch(new get_pages($url, $domain));


        return view("welcome",[
            "return_msg" => "the job will be work now please be patient to get results as it may take along time to be finished"
        ]);

    }
}

