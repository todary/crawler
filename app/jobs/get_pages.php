<?php

namespace App\Jobs;

use App\Models\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class get_pages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected  $url;
    protected  $domain;
    public function __construct($url, $domain)
    {
        $this->url = $url;
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
          elseif ($firstChar == "h" || $firstChar == "H")
          {
              $fullUrl = $key;
          }

          if(!empty($fullUrl)){

              $new_obj = Page::firstOrCreate([
                  "page_url" => $fullUrl
              ]);

              if(is_object($new_obj)){

                  get_sub_pages::dispatch($new_obj->page_url, $new_obj->page_id, $this->domain);

//                  dispatch(new get_sub_pages($new_obj->page_url, $new_obj->page_id, $this->domain));
              }

          }

        }

    }



}
