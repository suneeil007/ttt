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

$route['default_controller'] 	    = "cms";
$route['404_override'] 		    	= '';

$route['admin/dashboard']           = 'dashboard';
$route['admin']                     = 'auth/login';
$route['admin/users/(:any)']        = 'auth/$1';
$route['admin/users'] 		        = 'auth/index';
$route['auth/(:any)']               = "auth/$1";

$route['admin/cms/(:any)'] 			=  "cms/admin/$1";
$route['admin/feedback/(:any)'] 	=  "feedback/admin/$1";
$route['admin/testimonial/(:any)']  =  "testimonial/admin/$1";
$route['admin/category/(:any)'] 	=  "category/admin/$1";
$route['admin/product/(:any)'] 		=  "product/admin/$1";

$route['pages/(:any)'] 				=  "cms/index";
$route['categories/(:any)'] 		=  "cms/categories/$1";
$route['tours/(:any)'] 		    	=  "cms/products/$1";
$route['tour/(:any)'] 		    	=  "cms/product/$1";
$route['product'] 					=  "cms/product1";

$route['tour/search'] 			    =  "cms/search";

$route['featuredProduct/(:any)']	=  "cms/featuredProduct";

$route['admin/booking/(:any)']      =  "booking/admin/$1";

$route['tour/blog1'] 			    =  "cms/blog1";

$route['admin/blog/(:any)']         =  "blog/admin/$1";

$route['registration']              =  "auth/client/registration";

$route['issue']                     =  "auth/client/issue";


$route['issues']                    =   "auth/client/issues";

$route['issue_list']                    =   "auth/client/issue_list";

/*
For individual config file under modules
$modules_path = APPPATH.'modules/';     
$modules = scandir($modules_path);

foreach($modules as $module)
{
    if($module === '.' || $module === '..') continue;
    if(is_dir($modules_path) . '/' . $module)
    {
        $routes_path = $modules_path . $module . '/config/routes.php';
        if(file_exists($routes_path))
        {
            require($routes_path);
        }
        else
        {
            continue;
        }
    }
}
*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */ ?>