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
            $data = (object) $request->form;
            print_r($data);
        }
    }
}
?>