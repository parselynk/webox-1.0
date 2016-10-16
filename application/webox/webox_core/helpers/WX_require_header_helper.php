<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('insert_header')){
    /**
	 * insert_header
	 *
	 * Adds JavaScript and CSS files to CI config. 
	 *
	 * @param	string | array	$file
	 * @param	string $type
	 * @return	void
	 */
    function insert_header($file = null)
    {
        $valid_types = ['css','js'];
        $ci = &get_instance();
        if(empty($file)){
            return;
        }
 
       if(!is_array($file) && count($file) <= 0){
            return;
        }
            
            foreach($file as $item){
                if (strpos($item, 'js') !== false) {
                    $header = $ci->config->item("js_headers");
                    $header_name = "js_headers"; 
                    $header[] = $item;
                    $ci->config->set_item($header_name,$header);
                }
                if (strpos($item, 'css') !== false) {
                    $header  = $ci->config->item("css_headers");
                    $header_name = "css_headers"; 
                    $header[] = $item;
                    $ci->config->set_item($header_name,$header);
                }
            }

    
    }

}
 
 
if(!function_exists('require_headers')){
    /**
	 * require_headers
	 *
	 * Loads JavaScript and CSS files in header. 
	 *
	 * @return	string
	 */
    function require_headers()
    {
        $headers = "\n";
        $ci = &get_instance();
        $css_headers = $ci->config->item('css_headers');
        $js_headers = $ci->config->item('js_headers');
        $style_url = base_url().$ci->config->item('style_path');
        $js_url = base_url().$ci->config->item('js_path');
        $style_path = FCPATH.$ci->config->item('style_path');
        $js_path = FCPATH.$ci->config->item('js_path');
        
        if (!empty($css_headers)){
            foreach($css_headers as $item){
                if (file_exists($style_path.$item)){
                    $headers .= link_tag($style_url.$item);
                }else{
                    $headers .= "<!-- ERROR 404 :: {$item} does not exist. -->\n";
                }
            }
        }
        if (!empty($js_headers)){
            foreach($js_headers as $item){
                if (file_exists($js_path.$item)){
                    $headers .= '<script type="text/javascript" src="'.$js_url.$item.'"></script>'."\n";
                } else {
                    $headers .= "<!-- ERROR 404 :: {$item} does not exist. -->\n";
                }
            }
         } 

        return $headers;
    }
}

