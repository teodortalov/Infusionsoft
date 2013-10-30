<?php

namespace Talov\Infusionsoft\Facades;

use Illuminate\Support\Facades\Facade;

class Infusionsoft extends Facade{
	
	protected static function getFacadeAccessor()
	{
		return 'infusionsoft';
	}
}