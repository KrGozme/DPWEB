<?php
class viewModel{
    protected static function get_view($view){
        $white_list = ["home", "users", "new-user", "edit-user", "clients", "new-cliente","edit-clients", "proveedor", "new-proveedor","edit-proveedor", "products", "new-product", "edit-product", "category", "new-category", "edit-category", "orders", "order-details", "profile", "settings"];
        if (in_array($view, $white_list)) {
            if (is_file("./view/" . $view . ".php")) {
                $content = "./view/" . $view . ".php";
            } else {
                $content = "404";
            }
        } elseif ($view == "login") {
            $content = "login";
        } else {
            $content = "404";
        }
        return $content;
    }
}
