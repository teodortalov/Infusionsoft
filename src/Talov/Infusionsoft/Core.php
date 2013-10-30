<?php

namespace Talov\Infusionsoft;

use  Illuminate\Support\Facades\Config;
use  Illuminate\Support\Facades\Cache;
use teodortalov\PHP_iSDK\src\isdk;

class Core {
	private $api;
	public function __construct(){

// 		$diff = $this->array_merge_recursive_distinct(Config::get('infusionsoft::infusionsoft'), Config::get('infusionsoft'));
// 		var_dump(Config::get('infusionsoft::infusionsoft'));
// 		var_dump(Config::get('infusionsoft')); exit;
		$this->api = new \iSDK();
		$this->api->cfgCon(Config::get('infusionsoft.applicaiton_name'), Config::get('infusionsoft.api_key'));
	}
	public function api(){
		return $this->api;
	}
	public function array_merge_recursive_distinct(array $array1, $array2 = null)
	{
	  $merged = $array1;
	 
	  if (is_array($array2))
	    foreach ($array2 as $key => $val)
	      if (is_array($array2[$key]))
	        $merged[$key] = is_array($merged[$key]) ? $this->array_merge_recursive_distinct($merged[$key], $array2[$key]) : $array2[$key];
	      else
	        $merged[$key] = $val;
	 
	  return $merged;
	}
	public function getAllProducts(){
		$fields = Config::get('infusionsoft::infusionsoft.service_fields.product');

		if(!Cache::has('products')){
			$products = $this->api->dsQuery('Product', 1000, 0, array('Id' => '%'), $fields);
			$this->cache('products', $products);
		}else{
			$products = Cache::get('products');
		}

		return $products;
	}
	public function getProductById($id){
		foreach ($this->getAllProducts() as $product) {
			if($product['Id'] == $id){
				return $product;
			}
		}
		
		return false;
	}
	public function getProductCategories($limit = 1000){
		$fields = Config::get('infusionsoft::infusionsoft.service_fields.product_category');

		if(!Cache::has('categories')){
			$categories = $this->api->dsQuery('ProductCategory', $limit, 0, array('Id' => '%'), $fields);
			$this->cache('categories', $categories);
		}else{
			$categories = Cache::get('categories');
		}
		
		return $categories;
	}
	public function cache($key, $collection){
		$minutes = $this->config('config.cache_minutes');

		if(!$minutes){
			return false;
		}
		
		if($minutes == 0){
			Cache::forever($key, $collection);
		}else{
			Cache::put($key, $collection, $minutes);
		}
		
		return $collection;
	}
	protected function config($context){
		return Config::get('infusionsoft::infusionsoft.'.$context);
	}
}