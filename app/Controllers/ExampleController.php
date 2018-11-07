<?php

namespace app\Controllers;

use lib\BaseController;

class ExampleController extends BaseController {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

}