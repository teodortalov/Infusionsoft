<?php

/**
 * @author Teodor
 *
 */
namespace Talov\Infusionsoft;


/**
 * @author Teodor
 *
 */
class Infusionsoft {
	
	public function __construct(){
		
	}
	public function getService(){
		return new Core(); 
	}
}