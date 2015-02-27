<?php 

App::uses('HttpSocket', 'Network/Http');
class EndpointBehavior extends ModelBehavior {

	public $endpointHost = null;

	public $http = 'http://';


	public function callEndpoint(&$Model, $path= null, $type = 'POST', $data = array(), $options = array()){
		$db = ConnectionManager::getDataSource($Model->useDbConfig);
		$this->endpointHost = $db->config['host'];
		$this->http = !empty( $db->config['https'])? 'https://' : 'http://';
		$fullPath = $this->http.$this->endpointHost . $path;
		//debug($Model->useDbConfig);
		//debug($fullPath);
		//$request = new CakeRequest($fullPath);
		$http = new HttpSocket();
		if($type == 'POST'){
			$request = $http->post($fullPath,$data,$options);
		}else{
			$request = $http->get($fullPath,$data,$options);
		}
		return $request;
	}

}