<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class PHPInterfaceObject extends AInterfaceObject {

    public function toString() {
        $interface = '<?php ' . PHP_EOL;
        $interface .= 'interface ' .$this->getName() . ' {' . PHP_EOL . PHP_EOL;
        foreach($this->methods as $method){
            $interface .= $method->toString(); 
            $interface .= PHP_EOL;
        }
        $interface .= '}';
        return $interface;
    }

}
