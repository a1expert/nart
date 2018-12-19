<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/transport-services/(.*)/(\\?(.*))?$#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/transport-services/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/(\\w*_rent)/(.*)/(\\?(.*)){0,1}$#',
    'RULE' => 'ELEMENT_CODE=$2',
    'ID' => 'a1expert:rent.detail',
    'PATH' => '/vehicle-rent/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/(\\w*_rent)/(\\?(.*))?$#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => 'a1expert:rent.list',
    'PATH' => '/vehicle-rent/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
