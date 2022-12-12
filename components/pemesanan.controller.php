<?php
class PemesananController extends Controller {
    function add() {
        $id = 0;

        $model = new PemesananModel();
        $view = new PemesananView();
        
        $view->entry($model->get($id));
    }

    function edit() {
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

        $model = new PemesananModel();
        $view = new PemesananView();
        
        $view->entry($model->get($id));
    }

    function delete() {
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

        $model = new PemesananModel();
        $view = new PemesananView();
        
        $model->delete($id);
        $view->index($model->getAll());
    }

    function save() {
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

        $model = new PemesananModel();
        $view = new PemesananView();

        $error = $model->save($id);
        if (count($error) == 0) {
            $view->index($model->getAll());
        } else {
            $view->show($error);
        }
    }

    function index() {
        $model = new PemesananModel();
        $view = new PemesananView();
        
        $view->index($model->getAll());
    }
}
?>