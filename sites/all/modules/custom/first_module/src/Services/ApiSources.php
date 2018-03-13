<?php
namespace Drupal\firts_module\Services;

use GuzzleHttp\Client;

/**
* Class ApiSources.
*
* @package Drupal\firts_module\Services
*/
class ApiSources {

/**
* Api url.
*
* @var
*/
protected $url;

/**
* ApiSources constructor.
*/
public function __construct($url) {
$this->url = $url;
}

/**
* Returns the list of api sources.
*/
public function get() {
$client = new Client();
$request = $client->request('GET', $this->url);
$request = \GuzzleHttp\json_decode($request->getBody());
return $request->sources;
}

}