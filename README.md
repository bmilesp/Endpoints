Endpoints
=========

Simple CakePHP API endpoints plugin for simplicity in connecting to API endpoints


# Requirements


# Installation


_[Using [Composer](http://getcomposer.org/)]_

[View on Packagist](https://packagist.org/packages/bmilesp/endpoints), and copy the json snippet for the latest version into your project's `composer.json`. Eg, v. 2.1.x-dev would look like this:

```javascript
{
	"require": {
		"bmilesp/endpoints": "2.1.x-dev"
	}
}
```

# Enable plugin

Add following lines in yout app/Config/bootstrap.php file

	Create a database config variable that uses the Endpoints.ApiSource datasource, and the API domain as the host:

```php
	
	public $website_source = array(
    	'datasource' => 'Endpoints.ApiSource',
    	'host' => 'website.com'
    );
``` 

	Then setup the model by using the behavior and datasource we've just setup:

```php
	
	public $uses = array('website_source');
	public $actsAs = array('Endpoints.Endpint');

```

	Finally, to send and retrieve data from an endpoint. here is an example

```php

	function unlock($slug = null){
		$postData = array('id' => 23);
		$result = $this->callEndpoint('/users/get_user_by_id',$postData);
		return $result->body; 	
	}

```

# Usage
