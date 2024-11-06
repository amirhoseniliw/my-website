<?php 
namespace App;
use database\DataBase;
class Home {
    protected function redirect($url) //? forward to page
    {
        header("Location:" . trim(CURRENT_DOMAIN, "/ ") . "/" . trim($url, "/ "));
        exit;
    }
    protected function redirectBack()//? back forward to page
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function index_fn() {
       
                require_once (BASE_PATH.'/template/app/index_fn.php');

    }
    public function sore_masseg ($request){
        date_default_timezone_set('Iran');
        array_filter($request);
        $db = new database();
      $message =  $db->insert('message', array_keys($request), $request);
        if ($message) {
            $_SESSION['message']= "true";
        }
       else {
        $_SESSION['message']= "false";
       }
$this->redirect('/home');
    }
}