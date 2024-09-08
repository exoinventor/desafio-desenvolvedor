<?php
namespace COMPOSITION\Controller\app\route;

use COMPOSITION\View\ScreenSwitch;

if(!class_exists('HomeController'))
{
    class HomeController extends ScreenSwitch
    {
        public function index()
        {
            return parent::screen_display('home');
            /* var_dump('home'); */
        }
    }
}
?>