<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['stok/in'] = 'stok/stok_in_data';
$route['stok/in/add'] = 'stok/stok_in_add';
$route['stok/in/del/(:num)/(:num)'] = 'stok/stok_in_del';

$route['stok/out'] = 'stok/stok_out_data';
$route['stok/out/add'] = 'stok/stok_out_add';
$route['stok/out/del/(:num)/(:num)'] = 'stok/stok_out_del';

$route['laporan/stok/in'] = 'stok/laporan_stok_in';
$route['laporan/stok/in/by_full'] = 'stok/by_full';
$route['laporan/stok/in/by_tgl'] = 'stok/by_tgl';
$route['laporan/stok/in/by_bln'] = 'stok/by_bln';
$route['laporan/stok/in/by_thn'] = 'stok/by_thn';

$route['laporan/stok/out'] = 'stok/laporan_stok_out';
$route['laporan/stok/out/by_full'] = 'stok/by_fullo';
$route['laporan/stok/out/by_tgl'] = 'stok/by_tglo';
$route['laporan/stok/out/by_bln'] = 'stok/by_blno';
$route['laporan/stok/out/by_thn'] = 'stok/by_thno';

$route['laporan/penjualan/by_full'] = 'penjualan/by_full';
$route['laporan/penjualan/by_tgl'] = 'penjualan/by_tgl';
$route['laporan/penjualan/by_bln'] = 'penjualan/by_bln';
$route['laporan/penjualan/by_thn'] = 'penjualan/by_thn';

$route['laporan/retur/by_full'] = 'retur/by_full';
$route['laporan/retur/by_tgl'] = 'retur/by_tgl';
$route['laporan/retur/by_bln'] = 'retur/by_bln';
$route['laporan/retur/by_thn'] = 'retur/by_thn';

$route['laporan/service/by_full'] = 'service/by_full';
$route['laporan/service/by_tgl'] = 'service/by_tgl';
$route['laporan/service/by_bln'] = 'service/by_bln';
$route['laporan/service/by_thn'] = 'service/by_thn';


$route['laporan/penjualan'] = 'penjualan/laporan';
$route['laporan/barang'] = 'barang/laporan';
$route['laporan/customer'] = 'customer/laporan';
$route['laporan/supplier'] = 'supplier/laporan';
$route['laporan/retur'] = 'retur/laporan';
$route['laporan/service'] = 'service/laporan';

$route['service/finish'] = 'service/ambil_data';
