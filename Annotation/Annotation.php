<?php


class Annotation {
    
    /**
     * Name of the annotation
     * @var string 
     */
    protected $name;
    
    /**
     * Value of the annotation
     * @var string
     */
    protected $value;
    
    /**
     * Interpreter of the annoation (@ for php)
     * @var string 
     */
    protected $interpreter;
    
    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function getInterpreter() {
        return $this->interpreter;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setInterpreter($interpreter) {
        $this->interpreter = $interpreter;
    }


}