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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// /*product url*/
// $route['product/'] = "product/index/";
// $route['product/(:any)'] = "product/view/$1";


//hotfix shopController to Products(with s) controller
$route['products'] = "shop";
$route['products/(:any)'] = "shop/$2";
$route['products/(:any)/(:num)'] = "shop/$2/$3";


// Products urls style
$route['product/(:any)_(:num)'] = "product/viewProduct/$2";
$route['product/(\w{2})/(:any)_(:num)'] = "product/viewProduct/$3";
$route['product/product_data/(:num)'] = "product/product_data/$1";

// article
$route['articles'] = "articles";
$route['article/(:any)'] = "articles/article/$1";

// career
$route['career'] = "career";
$route['career/(:any)'] = "career/detail/$1";


# ADMIN

$route['admin'] = 'admin/dashboard';

// ECOMMERCE GROUP
$route['admin/add-product'] = "admin/ecommerce/AddProduct";
$route['admin/add-product/(:num)'] = "admin/ecommerce/AddProduct/index/$1";
$route['admin/edit-product/(:num)'] = "admin/ecommerce/AddProduct/index/$1";
$route['admin/removeSecondaryImage'] = "admin/ecommerce/AddProduct/removeSecondaryImage";
$route['admin/products'] = "admin/ecommerce/products";
$route['admin/products/(:num)'] = "admin/ecommerce/products/index/$1";
$route['admin/productStatusChange'] = "admin/ecommerce/products/productStatusChange";
$route['admin/product-categories'] = "admin/ecommerce/ShopCategories";
$route['admin/product-categories/(:num)'] = "admin/ecommerce/ShopCategories/index/$1";
$route['admin/category-spesification'] = "admin/ecommerce/ShopCategories/CategorySpesification";
$route['admin/category-spesification/(:num)'] = "admin/ecommerce/ShopCategories/CategorySpesification/$1";
$route['admin/editshopcategorie'] = "admin/ecommerce/ShopCategories/editShopCategorie";

$route['admin/excel'] = "admin/ecommerce/ExportExcel";
$route['admin/excel/resize-image'] = "admin/ecommerce/ExportExcel/resize_image";



$route['admin/changePosition'] = "admin/ecommerce/ShopCategories/changePosition";


// Admin pass change ajax
$route['admin/changePass'] = "admin/home/home/changePass";
$route['admin/uploadOthersImages'] = "admin/ecommerce/AddProduct/do_upload_others_images";
$route['admin/loadOthersImages'] = "admin/ecommerce/AddProduct/loadOthersImages";

# MISC

//Lang Route
$route['id'] = 'home';

// Maintenance
$this->config->load('akzncms_config');
if(!in_array($_SERVER['REMOTE_ADDR'], $this->config->item('maintenance_ips')) && $this->config->item('maintenance_mode'))
{	
	$route['default_controller'] = "home/maintenance";
    $route['(:any)'] = "home/maintenance";
}

// Theme spesific
if($this->config->item('theme')=='spe'){
    // $route['default_controller'] = 'shop';  
    $route['property'] = 'shop';  
}