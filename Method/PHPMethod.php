<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class PHPMethod extends AMethod {
    
    public function toString() {
        $method = "    \n" . $this->getScope() . " function {$this->getName()}(";
        foreach($this->parameters as $parameter){
            $method .= $parameter->getType() . ' $' . $parameter->getName() . ');' . PHP_EOL;
        }
            
        return $method;
    }

}
