<?php
class HomeController extends Controller {
    function login() {
        $model = new HomeModel();
        $result = $model->login();

        if ($result) {
            $view = new HomeView();
            $view->index();
        } else {
            header("Location:index.php?pesan=gagal");
        }
    }

    function logout() {
        $model = new HomeModel();
        $model->logout();
        
        header("Location:index.php");
    }

    function index() {
        $view = new HomeView();
        $view->index();
    }
}
?>