<?php

namespace Mdn\MiniProjectSekolah\App {
    function header(string $value){
        echo $value;
    }
}

namespace Mdn\MiniProjectSekolah\Service {
    function setCookie(string $name, string $value){
        echo "$name: $value";
    }
}
