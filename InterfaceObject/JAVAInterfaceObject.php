<?php

class JAVAInterfaceObject extends AInterfaceObject {
    
    public function toString() {
        $interface = 'public interface '. $this->name;
        $interface .= PHP_EOL . '{' . PHP_EOL . PHP_EOL;
        foreach($this->methods as $method){
            $interface .= $method->toString(); 
            $interface .= PHP_EOL;
        }
        $interface .= '}';
        return $interface;
    }

}
