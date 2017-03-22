<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



//SITE constants
define('SITE_NAME' , 'TREK');

// Files uploads 
define('GROUPS_DIR', APPPATH.'../uploads/groups');
define('GROUP_FILES_DIR' , APPPATH.'../uploads/groupfiles');
define('GALLERIES_DIR',  APPPATH.'../uploads/galleries');
define('FILES_DIR' , APPPATH.'../uploads/downloads');
define('TESTIMONIALS_DIR' , APPPATH.'../uploads/testimonials');
define('BLOG_DIR' , APPPATH.'../uploads/blog');
define('CATEGORIES_DIR' , APPPATH.'../uploads/categories');
define('PRODUCTS_DIR' , APPPATH.'../uploads/products');
define('COLORS_DIR' , APPPATH.'../uploads/product_colors');
define('VERITIES_DIR' , APPPATH.'../uploads/product_verities');

//SITE constants
define('ABOUT_US_ID', '26');
define('ANIM_IMAGES_ID', '20');
define('CONTACT_US_ID', '37');
define('ADVERTISEMENTS_ID', '15');
define('FAQS_ID', '16');
define('HOME_ID', '29');

define('INTRO_ID', '30');
define('TEAM_ID', '31');
define('LEGAL_ID', '32');
define('WHY_ID', '33');
define('TREKING_ID', '23');
define('TEST', '39');

define('ABOUT_NEPAL_ID', '40');
define('TRAVELLING_INFO', '41');
define('SAFETY_ID', '42');
define('TRAVELLING_GALLERY', '43');



/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);



/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/


define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */