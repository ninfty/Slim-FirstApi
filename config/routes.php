<?php

use Slim\App;

return function (App $app) {
    require __DIR__ . '/../config/routes/index.php';
    require __DIR__ . '/../config/routes/book.php';
};
