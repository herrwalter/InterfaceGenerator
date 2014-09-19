<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class PHPMethod extends AMethod {
    
    public function toString() {
        $method = "\t" . $this->getScope() . ' function(';
        foreach($this->parameters as $parameter){
            $method .= $parameter->getType() . ' $' . $parameter->getName() . ')' .PHP_EOL;
        }
        $method .= PHP_EOL;
        $method .= '\t}';
        return $method;
    }

}
