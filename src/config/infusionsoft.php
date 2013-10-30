<?php

// application/config/infusionsoft.php
return array(
	'config' => array(
 		'cache_minutes' => 5, //0 for forever
	),
	'service_fields' => array(
 		'product' => array(
 			'Id',
			'ProductName',
			'ProductPrice',
			'Sku',
			'ShortDescription',
			'Taxable',
			'CountryTaxable',
			'StateTaxable',
			'CityTaxable',
			'Weight',
			'IsPackage',
			'NeedsDigitalDelivery',
			'Description',
			'HideInStore',
			'Status',
			'TopHTML',
			'BottomHTML',
			'ShippingTime',
			'LargeImage',
			'InventoryNotifiee',
			'InventoryLimit',
			'Shippable',
		),
 		'product_category' => array(
 			'Id',
			'CategoryDisplayName',
// 			'CategoryImage',
// 			'CategoryOrder',
// 			'ParentId',
		),
	)
);