<?php
namespace COMPOSITION\Controller\app\route;

use COMPOSITION\View\ScreenSwitch;
   
if(!class_exists('SpreadsheetController'))
{
    class SpreadsheetController extends ScreenSwitch
    {
        public function index()
        {
            return parent::screen_display('spreadsheet');
            /* var_dump('storage'); */
        }

        public function spreadsheet($request)
        {
            header( 'Access-Control-Allow-Headers: Content-Type' );
            header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
            header( 'Access-Control-Allow-Origin: *' );
            /* header( 'Access-Control-Allow-Credentials: true' );
            header( 'Content-Type: application/json' );  /** */

            $tmp = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $storage_in = dirname(__DIR__, 3) . '/View/storage/junior-' . uniqid() . '.jpeg';
            if(move_uploaded_file($tmp, $storage_in))
            {
                $response = array(
                'array' => is_array($_FILES),
                'object' => is_object($_FILES),
                'json' => is_string($_FILES),
                'tmp' => $tmp,
                'name' => $name,
                'storage' => $storage,
                'file' => $_FILES,
                'msg' => 'Upload executado'
                );
            }
            else
            {
                $response = array(
                'array' => is_array($_FILES),
                'object' => is_object($_FILES),
                'json' => is_string($_FILES),
                'msg' => 'Upload não executado'
                );
            }
                echo json_encode($response); /** */
        }
    }
}
?>