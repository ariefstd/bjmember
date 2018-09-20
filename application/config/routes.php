<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user_admin';
$route['logout'] = 'user_admin/logout';
$route['userListing'] = 'user_admin/userListing';
$route['userListing/(:num)'] = "user_admin/userListing/$1";
$route['addNew'] = "user_admin/addNew";

$route['addNewUser'] = "user_admin/addNewUser";
$route['editOld'] = "user_admin/editOld";
$route['editOld/(:num)'] = "user_admin/editOld/$1";
$route['editUser'] = "user_admin/editUser";
$route['deleteUser'] = "user_admin/deleteUser";
$route['loadChangePass'] = "user_admin/loadChangePass";
$route['changePassword'] = "user_admin/changePassword";
$route['pageNotFound'] = "user_admin/pageNotFound";
$route['checkEmailExists'] = "user_admin/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['Menu'] = "menu_atas/menuListing";
$route['Menu/(:num)'] = "menu_atas/menuListing/$1";
$route['addMenuArtikel'] = "menu_atas/addNewArtikelMenu";
$route['addMenu'] = "menu_atas/addNew";
$route['addNewMenu'] = "menu_atas/addNewMenu";
$route['updateMenu'] = 'menu_atas/updateMenu';
$route['deleteMenu'] = "menu_atas/deleteMenu";
$route['Menu/update'] = 'menu_atas/update';
$route['Menu/update/(:num)'] = 'menu_atas/update/$1';

$route['Kegiatan'] = 'admin_kegiatan/userListing';
$route['Kegiatan/(:num)'] = "admin_kegiatan/userListing/$1";
$route['addKegiatan'] = "admin_kegiatan/addNew";
$route['addNewKegiatan'] = "admin_kegiatan/addNewKegiatan";
//$route['Kegiatan/add'] = 'admin_kegiatan/add';
$route['Kegiatan/update'] = 'admin_kegiatan/update';
$route['Kegiatan/update/(:num)'] = 'admin_kegiatan/update/$1';
$route['admin/Kegiatan/delete/'] = "admin_products/deleteArtikel";
//$route['admin/Kegiatan/delete/(:num)'] = 'admin_kegiatan/delete_artikel/$1';
//$route['admin/Kegiatan/(:any)'] = 'admin_kegiatan/index/$1'; //$1 = page number

$route['Arsip'] = 'admin_arsip/userListing';
$route['Arsip/(:num)'] = "admin_arsip/userListing/$1";
$route['addArsip'] = "admin_arsip/addNew";
$route['addNewArsip'] = "admin_arsip/addNewArsip";
//$route['Kegiatan/add'] = 'admin_kegiatan/add';
$route['Arsip/update'] = 'admin_arsip/update';
$route['Arsip/update/(:num)'] = 'admin_arsip/update/$1';
$route['admin/Arsip/delete/'] = "admin_products/deleteArtikel";

$route['Gallery'] = "gallery/index";
$route['Gallery/(:num)'] = "gallery/index/$1";
$route['Gallery/add/(:any)'] = 'gallery/add/$1';
$route['Gallery/adds'] = 'gallery/addGallery';
$route['Gallery/update'] = 'gallery/update';
$route['Gallery/update/(:num)'] = 'gallery/update/$1';

$route['Gallery/kegiatan'] = "gallery/galeryKegiatan";
$route['Gallery/kegiatan/(:num)'] = "gallery/galeryKegiatan/$1";

$route['Gallery/pemerintahan'] = "gallery/galeryPemerintahan";
$route['Gallery/pemerintahan/(:num)'] = "gallery/galeryPemerintahan/$1";

$route['Gallery/dokumentasi'] = "gallery/index";
$route['Gallery/dokumentasi/(:num)'] = "gallery/index/$1";
$route['Gallery/dokumentasi/update/(:num)'] = "gallery/update/$1";

$route['deleteGallery'] = "gallery/deleteGallery";
$route['Excel'] = "data_excel/export";
$route['Excel/(:num)'] = "data_excel/export/$1";
$route['Download'] = "data_excel/download";
$route['Download/(:num)'] = "data_excel/download/$1";
//$route['import'] = "data_excel/import";

$route['download'] = "export_excel/download";
$route['upload'] = "import_excel/upload";

/* End of file routes.php */
/* Location: ./application/config/routes.php */