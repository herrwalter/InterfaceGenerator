<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class Parameter {

    protected $name;
    
    protected $type;

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setType($type) {
        $this->type = $type;
    }


}
