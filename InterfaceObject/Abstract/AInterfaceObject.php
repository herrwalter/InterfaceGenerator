<?php


abstract class AInterfaceObject {
    
    /**
     * Interface name
     * @var type 
     */
    protected $name;
    
    /**
     * @var array<Method>
     */
    protected $methods = array();
    
    /**
     * Gets the name of the interface
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Adds a method to the interface
     * Will overwrite on existance.
     * 
     * @param Method $method
     */
    public function addMethod(AMethod $method) {
        $this->methods[$method->getName()] = $method;
    }
    
    /**
     * Removes a method from the interface if it exists
     * 
     * @param Method $method
     */
    public function removeMethod(AMethod $method){
        if(array_key_exists($method->getName(), $this->methods)){
            unset($this->methods[$method->getName()]);
        }
    }

    /**
     * Sets the name of the method.
     * @param type $name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    
    abstract public function toString();
    
    
}