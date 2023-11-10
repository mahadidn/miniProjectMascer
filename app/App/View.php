<?php

namespace Mdn\MiniProjectSekolah\App;

class View {

    public static function render(string $view, $model){
        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    public static function redirect(string $url){
        header("Location: $url");
    }

}
