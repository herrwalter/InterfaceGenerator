<?php


class CommentBlock {
    
    protected $comment;
    
    protected $parameters = array();
    
    protected $returnValue;
    
    protected $annotations = array();
    
    public function getComment() {
        return $this->comment;
    }

    public function getParameters() {
        return $this->parameters;
    }

    public function getReturnValue() {
        return $this->returnValue;
    }

    public function getAnnotations() {
        return $this->annotations;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setParameters($parameters) {
        $this->parameters = $parameters;
    }

    public function setReturnValue($returnValue) {
        $this->returnValue = $returnValue;
    }

    public function setAnnotations($annotations) {
        $this->annotations = $annotations;
    }

    public function addParameter(Parameter $parameter) {
        $this->parameters[$parameter->getName()] = $parameter;
    }

    public function removeParameter(Parameter $parameter) {
        if (array_key_exists($parameter->getName(), $this->parameters)) {
            unset($this->parameters[$parameter->getName()]);
        }
    }

    public function addAnnotation(Annotation $annotation) {
        $this->annotations[$annotation->getName()] = $annotation;
    }

    public function removeAnnotation(Annotation $annotation) {
        if (array_key_exists($annotation->getName(), $this->annotations)) {
            unset($this->annotations[$annotation->getName()]);
        }
    }
    
    public function toString(){
        $comment = "\t/**" . PHP_EOL;
        $commentlines = explode("\n", $this->comment);
        foreach($commentlines as $line){
            $comment .= "\t * " . $line . PHP_EOL;
        }
        foreach($this->annotations as $annotation){
            $comment .= "\t * " . $annotation->getInterpreter() . $annotation->getName() . " " . $annotation->getValue() . PHP_EOL;
        }
        foreach($this->parameters as $parameter){
            $comment .= "\t * @param " . $parameter->getType() . ' ' . $parameter->getName() . PHP_EOL; 
        }
        $comment .= "\t * @return " . $this->getReturnValue() . PHP_EOL;
        $comment .= "\t */";
        return $comment;
    }

    
}
