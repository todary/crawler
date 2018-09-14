<?php

namespace App\Jobs;

use App\Models\SubPage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class get_sub_pages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected  $url;
    protected  $id;
    protected  $domain;
    public function __construct($url, $id, $domain)
    {
        $this->url = $url;
        $this->id = $id;
        $this->domain = $domain;


    }


    public function handle()
    {

        $linkDepth = 1;
        // Initiate crawl
        $crawler = new \Arachnid\Crawler($this->url, $linkDepth);
        $crawler->traverse();

        // Get link data
        $links = $crawler->getLinks();

        foreach ($links as $key => $value){
            $firstChar = substr($key,0,1);
            $fullUrl = "";

            if($firstChar == '/'){
                $fullUrl = $this->domain.$key;
            }
            elseif ($firstChar == "h")
            {
                $fullUrl = $key;
            }

            if(!empty($fullUrl)){

                if(!empty($fullUrl)){

                    $new_obj = SubPage::firstOrCreate([
                        'sub_page_url'=>$fullUrl,
                        'page_id'=>$this->id
                    ]);

                }

            }

        }

    }



}
