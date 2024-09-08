<?php
namespace COMPOSITION\Controller\app\route;

use COMPOSITION\View\ScreenSwitch;

if(!class_exists('MainRoute'))
{
    class MainRoute extends ScreenSwitch
    {
        public function display_app_route( string $controller, string $action )
        {
            try
            {
                $controller_namespace = 'COMPOSITION\\Controller\\app\\route\\' . $controller;
                
                if(!class_exists($controller_namespace))
                {
                    return parent::screen_display('home');
                    /* var_dump('Error 0001 Processing Request' . $controller, 1); */
                }
                    $controller_instance = new $controller_namespace();
            
                if(!method_exists($controller_instance, $action))
                {
                    return parent::screen_display('home');
                    /* var_dump('Error 0002 Processing Request da ' . $action . ' no ' . $controller, 1); */ 
                }
                    $controller_instance->$action((object) $_REQUEST);
            }
            catch(Exception $e)
            {
                var_dump($e->getMessage());
            }
        }

        public function route_exammple() : array
        {
            $route = array(
            'GET' => array(
                '/' => fn () => $this->display_app_route( 'HomeController', 'index' ),
                '/contact' => fn () => $this->display_app_route( 'ContactController', 'index' )
            ),
            'POST' => array(
                '/contact' => fn () => $this->display_app_route( 'ContactController', 'store' )
            )
            );
                return $route;
        }

        public function route_exists_in()
        {
            $uri = $_SERVER['REQUEST_URI'];
            $query = $_SERVER['QUERY_STRING'];
            $method = $_SERVER['REQUEST_METHOD'];

            $quest_uri = ($uri != null && !empty($uri)) ? parse_url($uri) : array('path'=>'undefined','query'=>'undefined');
            $path = $quest_uri['path'];
            $query_string = ($query != null && !empty($query)) ? $query : 'str=undefined';
            $router = $this->route_exammple($path);

            $response = (array_key_exists($method, $router)) ? 'method exists' : 'method undefined';

            if(!isset($router[$method]))
            {
                return parent::screen_display('home');
                /* var_dump('Error 0003 Processing Request. Method not exists', 1); */
            }

            if(!array_key_exists($path, $router[$method]))
            {
                return parent::screen_display('400');
                /* var_dump('Error 0004 Processing Request. Route not exists', 1); */
            }

            $controller = $router[$method][$path];
            $controller();
        }
    }
}
?>