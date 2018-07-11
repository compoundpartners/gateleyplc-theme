<?php // Ensure single declaration of function!
if(!function_exists('wp_locate_loader')):
    /**
     * Locates wp-load.php looking backwards on the directory structure.
     * It start from this file's folder.
     * Returns NULL on failure or wp-load.php path if found.
     * 
     * @author EarnestoDev
     * @return string|null
     */
    function wp_locate_loader(){
        $increments = preg_split('~[\\\\/]+~', get_template_directory());
        $increments_paths = array();
        foreach($increments as $increments_offset => $increments_slice){
            $increments_chunk = array_slice($increments, 0, $increments_offset + 1);
            $increments_paths[] = implode(DIRECTORY_SEPARATOR, $increments_chunk);
        }
        $increments_paths = array_reverse($increments_paths);
        foreach($increments_paths as $increments_path){
            if(is_file($wp_load = $increments_path.DIRECTORY_SEPARATOR.'wp-load.php')){
                return $wp_load;
            }
        }
        return null;
    }
endif;