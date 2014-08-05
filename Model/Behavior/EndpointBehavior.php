<?php 

App::uses('HttpSocket', 'Network/Http');
class EndpointBehavior extends ModelBehavior {

	public $endpointHost = null;

	public $http = 'http://';

	public function setup($Model, $config = array()){
		$db = ConnectionManager::getDataSource($Model->useDbConfig);
		$this->endpointHost = $db->config['host'];
		$this->http = !empty( $db->config['https'])? 'https://' : 'http://';
		parent::setup($Model, $config);

	}

	public function callEndpoint(&$Model, $path= null, $type = 'POST', $data = array() ){
		$fullPath = $this->http.$this->endpointHost . $path;
		//$request = new CakeRequest($fullPath);
		$http = new HttpSocket();
		if($type == 'POST'){
			
			$request = $http->post($fullPath,$data);
		}
		return $request;
	}

}