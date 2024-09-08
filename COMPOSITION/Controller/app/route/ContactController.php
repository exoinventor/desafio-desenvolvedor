<?php
namespace COMPOSITION\Controller\app\route;

use COMPOSITION\View\ScreenSwitch;
   
if(!class_exists('ContactController'))
{
    class ContactController extends ScreenSwitch
    {
        public function index()
        {
            return parent::screen_display('contac');
            /* var_dump('contact'); */
        }

        public function store($request)
        {
            /* header( 'Access-Control-Allow-Origin: *' );
            header( 'Access-Control-Allow-Headers: Content-Type' );
            header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
            header( 'Access-Control-Allow-Credentials: true' );
            header( 'Content-Type: application/json' );  /** */
            
            $data = (object) $request->form;
            print_r($data);
        }
    }
}
?>