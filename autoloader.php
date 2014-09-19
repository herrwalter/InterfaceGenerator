<?php

function autoloader($class) {
    $directory_iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
    foreach($directory_iterator as $filename => $path_object)
    {
        if( strpos( $filename, $class . '.php' ) > -1 ){
            require_once $filename;
        }
    }
}

function file_list($d,$x){ 
       foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f; 
       return $l;
} 
spl_autoload_register('autoloader');