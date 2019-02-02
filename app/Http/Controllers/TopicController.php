<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Ranger;


class TopicController extends Controller
{

    public function __construct() {
    	$this->helper = new Ranger;
    	
    }

    public function getIndex() {
        
        $data = $this->helper->curl('topic');


        return view("topic-list", ['data'=>$data]);
    }

    public function getSave($id=false)
    {
    	$data = [];
    	if ($id) {
    		$model = $this->helper->curl('topic/'.$id);
    		if ($model->status == true) $data = $model->data[0];
    	}

    	// dd($data);
    	return view("topic-form", ['data'=>$data]);
    }

    public function postSave(Request $request)
    {

    	$url = 'topic/save';

    	if ($request->id) $url = 'topic/save/'.$request->id;

    	$data = $this->helper->curl($url, 'POST', $request->all());
    	
    	$message = 'failed';
    	if ($data->status == true) {
    		$message = 'Success';
    	}

    	return redirect('topic')->withInfo($message);
    }

    public function getDelete($id=false)
    {
    	
    	$url = 'topic/delete/'.$id;

    	$data = $this->helper->curl($url, 'POST', ['id'=>$id]);

    	$message = 'failed';
    	if ($data->status == true) {
    		$message = 'Success';
    	}

    	return redirect('topic')->withInfo($message);

    }
}
