<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */
abstract class AGenerator{
    
    /**
     * The JSON to read the generation from
     * @var string $json 
     */
    protected $json;
    
    /**
     * Folder to write to 
     * @var string $folder path to folder to generate to 
     */
    protected $folder;
    
    
    abstract public function setJson($json);
    
    abstract public function setFolder($folder);
    
    abstract public function generate();
    
}
