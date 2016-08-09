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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'menu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['menu'] = 'menu';
$route['siswa'] = 'm_siswa';
$route['hari'] = 'm_hari';
$route['semester'] = 'm_semester';
$route['jam'] = 'm_jam';
$route['mapel'] = 'm_mapel';
$route['jurusan'] = 'm_jurusan';
$route['jabatan'] = 'm_jabatan';
$route['pegawai'] = 'm_pegawai';
$route['ujian'] = 'm_ujian';
$route['kelas'] = 'm_kelas';
$route['jadwal'] = 't_jadwal';
$route['t_siswa'] = 't_siswa';
$route['t_ujian'] = 't_ujian';
$route['t_absensi'] = 't_absensi';
$route['t_ujian_nilai'] = 't_ujian_nilai';
$route['t_kelas'] = 't_kelas';
$route['t_pegawai'] = 't_pegawai'; 

