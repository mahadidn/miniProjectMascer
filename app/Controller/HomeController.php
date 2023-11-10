<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;

class HomeController {
    
    public function index(){
        
        View::render('index', []);

    }

}

