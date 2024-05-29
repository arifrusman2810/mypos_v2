<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['customer'] = 'pelanggan';
$route['customer/add'] = 'pelanggan/add';
$route['customer/process'] = 'pelanggan/process';
$route['customer/edit/(:num)'] = 'pelanggan/edit/$1';
$route['customer/delete/(:num)'] = 'pelanggan/delete/$1';

$route['stock/in'] = 'stock/stock_in_data';
$route['stock/in/add'] = 'stock/stock_in_add';
$route['stock/in/delete/(:num)/(:num)'] = 'stock/stock_in_delete';

$route['stock/out'] = 'stock/stock_out_data';
$route['stock/out/add'] = 'stock/stock_out_add';
$route['stock/out/delete/(:num)/(:num)'] = 'stock/stock_out_delete';

// $route['report/sale'] = 'report/sale';
// $route['report/stock'] = 'report/stock';

$route['reports'] = 'report';
$route['report/stock_report'] = 'report/stock_report';
$route['report/sale_report'] = 'report/sale_report';

$route['invoice'] = 'invoice';
$route['invoice/print/(:num)'] = 'invoice/print/$1';
$route['invoice/delete/(:num)'] = 'invoice/delete/$1';

