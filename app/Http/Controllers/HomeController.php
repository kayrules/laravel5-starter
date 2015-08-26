<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Theme;

class HomeController extends Controller
{
    public function GET_index()
    {
        $theme = Theme::uses('notebook')->layout('landing');
        $theme->setMenu('home.index');

        $theme->asset()->usePath()->add('landing', 'css/landing.css');
        
        $theme->asset()->container('post-scripts')->usePath()->add('laravel1', 'js/app.plugin.js');
        $theme->asset()->container('post-scripts')->usePath()->add('laravel2', 'js/scroll/smoothscroll.js');
        $theme->asset()->container('post-scripts')->usePath()->add('laravel3', 'js/landing.js');

        $params = array();
        return $theme->scope('home.index', $params)->render();
    }
}