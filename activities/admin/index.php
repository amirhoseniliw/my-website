<?php 
namespace Admin ;
use database\DataBase;

class admin {
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
    public function index (){
        require_once (BASE_PATH.'/template/admin/index.php');
    }
    public function nazrat (){
        $db = new database();
        $messages= $db->select("SELECT * FROM `message`")->fetchAll();
        require_once (BASE_PATH.'/template/admin/nazrat.php');
    }
}