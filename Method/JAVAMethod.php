<?php


class JAVAMethod extends AMethod {
    
    public function toString() {
        $method = $this->getCommentBlock() . PHP_EOL;
        $method .= "\t public {$this->returnValue} {$this->name} (";
        foreach($this->parameters as $parameter){
            $method .= $parameter->getType() . ' $' . $parameter->getName() . ');' . PHP_EOL;
        }
        return $method;
    }

}
