<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Models\Channel;

class ArticleCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:article';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function saveChannels()
    {
        $crawler = file_get_html("https://vnexpress.net/rss/khoa-hoc.rss");
        $contents = $crawler->find('channel');
        $channels = array();
        foreach ($contents as $content) {
            //get titles
            $titles = $content->find('title');
            $datas['title'] = $titles[0]->innertext;

            $descriptions = $content->find('description');
            $datas['description'] = $descriptions[0]->innertext;

            $pubDates = $content->find('pubDate');
            $datas['pubDate'] = $pubDates[0]->innertext;

            $generators = $content->find('generator');
            $datas['generator'] = $generators[0]->innertext;

            $datas['user_id'] = rand(1, 3);
            $channels[] = $datas;
           
        }
           //dd($channels);
        foreach ($channels as $channel) {
            Channel::create($channel);
        }
           
        
    }

    public function saveItems()
    {

        $crawler = file_get_html("https://vnexpress.net/rss/khoa-hoc.rss");
        $contents = $crawler->find('item');
        $items = array();
        foreach ($contents as $content) {
            //get titles
            $titles = $content->find('title');
            $datas['title'] = $titles[0]->innertext;
            //get descriptions
            $descriptions = $content->find('description');
            $descriptionXMl = $descriptions[0]->xmltext();
            $descriptionString = str_get_html($descriptionXMl);
            $descriptionLinks =  $descriptionString->find('a');
            $datas['descriptionLink'] = $descriptionLinks[0]->href;
            $descriptionImageLinks =  $descriptionString->find('img');
            $datas['descriptionImageLink'] = $descriptionImageLinks[0]->src;
            $datas['descriptionContent'] = substr($descriptionString->plaintext, 5);
            //get pubDates
            $pubDates = $content->find('pubDate');
            $datas['pubDate'] = $pubDates[0]->innertext;
            //get guids
            $guids = $content->find('guid');
            $datas['guid'] = $guids[0]->innertext;  

            $datas['channel_id'] = Channel::max('id');
            $items[] = $datas; 
        }
        //dd($items);
        foreach ($items as $item) {
           Item::create($item);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->saveChannels();
        $this->saveItems();
    }   

        

    
}
