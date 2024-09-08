<?php
namespace COMPOSITION\View;

if(!class_exists('ScreenSwitch'))
{
    abstract class ScreenSwitch
    {
        protected function screen_display(string $view = '', array $data = [])
        {
            $element = $this->screen_asset();
            
            print($element->head);
            $asset_content = COMP_VIEW . '/template/' . $view . '.php';
            $content = file_get_contents($asset_content);
            $screen_content = preg_replace( "/\r|\n/", "", $content );
            print($screen_content);
            print($element->footer);
        }
        
        /* protected function __call($name, $arguments)
        {
            /*http_response_code(404);
            require $this->home;
            // require COMP_VIEW . '/template/400.php';
            require $this->footer;* /
        } /** */

        private function screen_asset()
        {
            $asset_folder = COMP_VIEW . '/asset';

            $head = file_get_contents($asset_folder . '/head.php');
            $screen_head = preg_replace( "/\r|\n/", "", $head );

            $footer = file_get_contents($asset_folder . '/footer.php');
            $screen_footer = preg_replace( "/\r|\n/", "", $footer ); /** */

            $result = (object) array(
            'head' => $screen_head,  
            'footer' => $screen_footer  
            );

            return $result;
        }
    }
}
?>