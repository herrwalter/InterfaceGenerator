<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class JAVAGenerator extends AGenerator
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
            $filename = $interface['name'] . '.java';
            $interfaceObject = new JAVAInterfaceObject();
            $interfaceObject->setName($interface['name']);
            foreach ($interface['methods'] as $method) {
                $methodObject = new JAVAMethod();
                $methodObject->setName($method['name']);
                $methodObject->setReturnValue($method['returnType']);
                $methodObject->setScope($method['scope']);
                $methodObject->setComment($method['comment']);
                foreach ($method['parameters'] as $parameter) {
                    $parameterObject = new Parameter();
                    $parameterObject->setName($parameter['name']);
                    $parameterObject->setType($parameter['type']);
                    $methodObject->addParameter($parameterObject);
                }
                foreach ($method['annotations'] as $annotation) {
                    $annotationObject = new Annotation();
                    $annotationObject->setName($annotation['name']);
                    $annotationObject->setValue($annotation['value']);
                    $annotationObject->setInterpreter('@');
                    $methodObject->addAnnotation($annotationObject);
                }
                $interfaceObject->addMethod($methodObject);
                
            }
            file_put_contents($this->folder . DIRECTORY_SEPARATOR . $filename, $interfaceObject->toString());
        }
    }

}
