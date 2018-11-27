<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/transport-services/(.*)/\\?*(.*?)$#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/transport-services/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/vehicle-rent/(.*)/\\?*(.*?)$#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/vehicle-rent/detail.php',
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
