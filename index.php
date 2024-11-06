<?php
use Auth\Auth;

// use database\DataBase;

//session start
session_start();
$_SESSION['message'] = "0";

//config
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/amirhoseniliw');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_NAME', 'amirhose_amirhoseniliw');
define('DB_USERNAME', 'amirhose_iliw');
define('DB_PASSWORD', '@Amirrima2');
//mail
// define('MAIL_HOST', 'smtp.gmail.com');
// define('SMTP_AUTH', true);
// define('MAIL_USERNAME', 'tools.iliw@gmail.com');
// define('MAIL_PASSWORD', 'pfqekwlhbtfhtjia');
// define('MAIL_PORT', 587);
// define('SENDER_MAIL', 'tools.iliw@gmail.com');
// define('SENDER_NAME', 'iliw');
// require_once 'activities/Admin/Admin.php';



//? Auth 
//! for login and register
require_once 'database/DataBase.php';

require_once 'activities/app/home.php';
require_once 'activities/admin/index.php';
require_once 'activities/auth/index.php';

// $db = new database\Database();
// $db = new database\CreateDB();
// $db->run();



spl_autoload_register(function($className){
        $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        include $path . $className . '.php';
});
function jalaliData($date){
        return \Parsidev\Jalali\jdate::forge($date)->format('datetime');
}
// uri('admin/category', 'Category', 'index');
// uri('admin/category/store', 'Category', 'store', 'POST');
function uri($reservedUrl, $class, $method, $requestMethod = 'GET') 
{

    //? current url array
    $currentUrl = explode('?', currentUrl())[0]; // convert to array 
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl); // delete CURRENT_DOMAIN in url
    $currentUrl = trim($currentUrl, '/');//delete / first  and last 
    $currentUrlArray = explode('/', $currentUrl);//  convert to array
    $currentUrlArray = array_filter($currentUrlArray);// delete empty house in array 
   //? reserved Url array
    $reservedUrl = trim($reservedUrl, '/');//delete / first  and last 
    $reservedUrlArray = explode('/', $reservedUrl);//  convert to array 
    $reservedUrlArray = array_filter($reservedUrlArray);// delete empty house in array 
       //?start if users url = admin url 
    if(sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod)
        {
                return false;
        }

        $parameters = [];//my parameters for sent batwing pages
        for($key = 0; $key < sizeof($currentUrlArray); $key++)
        {
                if($reservedUrlArray[$key][0] == "{" && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}")
                {
                        array_push($parameters, $currentUrlArray[$key]);//push parameters to target page 
                }
                elseif($currentUrlArray[$key] !== $reservedUrlArray[$key])
                {
                        return false;
                }
        }

        if(methodField() == 'POST')
        {
                $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
                $parameters = array_merge([$request], $parameters);
        }

        $object = new $class;//create a new object of class
        call_user_func_array(array($object, $method), $parameters);//push parameters to class 
        exit();
}
// admin/category/edit/{id} reserved url
// admin/category/delete/{id} reserved url
// admin/category/edit/5 current url 
// admin/category/edit/5 current url 
// uri('admin/category', 'Category', 'index');


//helpers
//! HTTP OR HTTPS

function protocol() {
     return  stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://'; 
}

//! htttps or http + domian
function currentDomain()
 {
        return protocol() . $_SERVER['HTTP_HOST'];
}

//! for css & js & img
function asset($src){

        $domain = trim(CURRENT_DOMAIN, '/ ');
        $src = $domain . '/' . trim($src, '/');
        return $src;
}
//! for <a>
function url($url){

        $domain = trim(CURRENT_DOMAIN, '/ ');
        $url = $domain . '/' . trim($url, '/');
        return $url;
}
//! url user
function currentUrl()
{
        return currentDomain() . $_SERVER['REQUEST_URI'];
}
//! get or post

function methodField()
{
        return $_SERVER['REQUEST_METHOD'];
}
//! shoe errors

function displayError($displayError)
{

        if($displayError)
        {
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
        }
        else
        {
                ini_set('display_errors', 0);
                ini_set('display_startup_errors', 0);
                error_reporting(0);
        }

}
//! for create error 

displayError(DISPLAY_ERROR);


global $flashMessage;
if(isset($_SESSION['flash_message'])){
        $flashMessage = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
}

//! for print error set and get first time for set and scend time for get

function flash($name, $value = null)
{
        if($value === null){
                global $flashMessage;
                $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
                return $message;
        }
        else{
                $_SESSION['flash_message'][$name] = $value;
        }

}
//?flash('login_error') seter // create error 
//?flash('login_error', 'email is not true') geter // print error of ths name 



function dd($var){
    echo '<pre>';
    var_dump($var);
    exit;
    
}

//?dashboard
// uri('admin', 'Admin\Dashboard', 'index');


//? category

//! app 
uri('/', 'App\Home', 'index_fn');
uri('/home', 'App\Home', 'index_fn');
uri('/sore_masseg', 'App\Home', 'sore_masseg','POST');
uri('/login_admin', 'Auth\auth', 'login',"POST");
uri('/login', 'Auth\auth', 'index');

uri('/dasebord', 'Admin\admin', 'index');
uri('/dasebord/nazrat', 'Admin\admin', 'nazrat');

// uri('/show-post/{id}', 'App\Home', 'show');
// uri('/show-category/{id}', 'App\Home', 'category');
// uri('/comment-store', 'App\Home', 'commentStore', 'POST');


echo '404 - page not found';