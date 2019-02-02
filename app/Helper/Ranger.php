<?php namespace App\Helper;

class Ranger
{
	
	public function __construct()
	{
		$this->baseurl = env('API_BASE','http://localhost/rangercode/ranger/public/');	

	}

	public function curl($api, $method="GET", $bodyParam=[])
	{
		$url = $this->baseurl . $api;

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
		if ($method != 'GET') {
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($bodyParam));
		}

		$data = curl_exec($curl);
		curl_close($curl);
		

		return json_decode($data);
	}
}