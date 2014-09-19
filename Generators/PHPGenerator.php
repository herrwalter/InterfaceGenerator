<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class PHPGenerator extends AGenerator
{

    public function setFolder($folder)
    {
        if (!file_exists($folder)) {
            throw new Exception('Folder does not exist');
        }
        if (!is_writable($folder)) {
            throw new Exception('Folder is no writeable');
        }
        $this->folder = $folder;
    }

    /**
     * Sets the json
     * @param type $json
     */
    public function setJson($json)
    {
        $this->json = file_get_contents($json);
    }

    /**
     * Generates the actual interfaces
     */
    public function generate()
    {
        $interfacesData = json_decode($this->json, true);
        foreach ($interfacesData as $interface) {
            $filename = $interface['name'] . '.php';
            $interfaceObject = new PHPInterfaceObject();
            $interfaceObject->setName($interface['name']);
            foreach ($interface['methods'] as $method) {
                $methodObject = new PHPMethod();
                $methodObject->setName($method['name']);
                $methodObject->setReturnValue($method['returnType']);
                $methodObject->setScope($method['scope']);
                foreach ($method['parameters'] as $parameter) {
                    $parameterObject = new Parameter();
                    $parameterObject->setName($parameter['name']);
                    $parameterObject->setType($parameter['type']);
                    $methodObject->addParameter($parameterObject);
                }
                $interfaceObject->addMethod($methodObject);
                
            }
            file_put_contents($this->folder . DIRECTORY_SEPARATOR . $filename, $interfaceObject->toString());
        }
    }

}
