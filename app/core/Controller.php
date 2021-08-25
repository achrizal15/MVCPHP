<?php
class Controller
{
    public function views($view, $data = [], $title = "Title")
    {
        $menu = ['Home', "Kasir", "Barang"];
        require "../app/views/Template/header.php";
        require "../app/views/$view.php";
        require "../app/views/Template/footer.php";
    }
    public function models($model)
    {
        require "../app/models/$model.php";
        return new $model;
    }
}
