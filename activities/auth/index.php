<?php 
namespace Auth;
class auth {
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
        require_once (BASE_PATH.'/template/login/login.php');

    }
    public function login ($request){
        $username = "amirhoseniliw";
$password = "@Amirrima2";
if ($request['name'] ==  $username && $request['pas'] == $password) {
    $_SESSION['souse'] = "1";
    $this->redirect('/dasebord');
}
else {
    flash('login_error', 'error to login accant!');
}
    }
}