<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;

class HomeController extends AbstractController {

    #[Route(path: '/')]
    public function indexAction(): string {
        return $this->render('index', [
            'message' => 'Welcome to Home!'
        ]);
    }

    #[Route(path: '/test')]
    public function testAction(): string {
        return $this->render('index', [
            'message' => 'Welcome to Home!'
        ]);
    }
}
