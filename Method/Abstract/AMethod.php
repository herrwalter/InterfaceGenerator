<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

abstract class AMethod {

    /**
     * Method name
     * @var string 
     */
    protected $name;

    /**
     * Set return value
     */
    protected $returnValue;

    /**
     * Either public or static
     * @var string 
     */
    protected $scope;

    /**
     * List of paramters
     * @var array<Parameter> 
     */
    protected $parameters = array();

    public function getName() {
        return $this->name;
    }

    public function getScope() {
        return $this->scope;
    }

    public function getReturnValue() {
        return $this->returnValue;
    }

    public function setReturnValue($returnValue) {
        $this->returnValue = $returnValue;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setScope($scope) {
        if ($scope == 'public' || $scope == 'static') {
            $this->scope = $scope;
        }
    }

    public function addParameter(Parameter $parameter) {
        $this->parameters[$parameter->getName()] = $parameter;
    }

    public function removeParameter(Parameter $parameter) {
        if (array_key_exists($parameter->getName(), $this->parameters)) {
            unset($this->parameters[$parameter->getName()]);
        }
    }

    abstract public function toString();
}
