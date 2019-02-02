<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Ranger;


class NewsController extends Controller
{

    public function __construct() {
    	$this->helper = new Ranger;
    	
    }

    public function getIndex() {
        
        $data = $this->helper->curl('news');
        
        
        return view("news-list", ['data'=>$data]);
    }

    public function getSave($id=false)
    {
    	$data = [];
    	$newsTopic = [];
    	if ($id) {
    		$model = $this->helper->curl('news/'.$id);
    		if ($model->status == true) {

    			$data = $model->data[0];


    			foreach ($data->news_topic as $top) {
    				$newsTopic[] = $top->topic_id;
    			}	
    		} 



    	}

    	$topic = $this->helper->curl('topic');

    	// dd($newsTopic);
    	return view("news-form", ['data'=>$data, 'topic'=>$topic, 'newsTopic'=>$newsTopic]);
    }

    public function postSave(Request $request)
    {
    	// dd($request->all());
    	$url = 'news/save';

    	if ($request->id) $url = 'news/save/'.$request->id;

    	$data = $this->helper->curl($url, 'POST', $request->all());
    	// dd($data);
    	$message = 'failed';
    	if ($data->status == true) {
    		$message = 'Success';
    	}

    	return redirect('news')->withInfo($message);
    }

    public function getDelete($id=false)
    {
    	
    	$url = 'news/delete/'.$id;

    	$data = $this->helper->curl($url, 'POST', ['id'=>$id]);

    	$message = 'failed';
    	if ($data->status == true) {
    		$message = 'Success';
    	}

    	return redirect('news')->withInfo($message);

    }
}
