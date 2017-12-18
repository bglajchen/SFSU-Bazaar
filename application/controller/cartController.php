<?php

class cartController extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/cart/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
