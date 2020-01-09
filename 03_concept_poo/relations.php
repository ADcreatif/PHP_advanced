<?php
/////////////////////////////////////////////////////////////////////////////////
//                              Composition
/////////////////////////////////////////////////////////////////////////////////
class Engine{}
class Car{
    private $engine;
    public function __construct() {
        $this->engine = new Engine();
    }
}

/////////////////////////////////////////////////////////////////////////////////
//                              Aggregation
/////////////////////////////////////////////////////////////////////////////////

class ProcessingVideo{
    public function compression(){}
}
class ProcessingImages{
    public function resize(){}
}

class UploadSystem{
    private $processType;
    public function setProcessingType($processType){
        $this->processType = $processType;
    }
}

$uploadSystem = new UploadSystem();
$uploadSystem->setProcessingType(new ProcessingImages());

/////////////////////////////////////////////////////////////////////////////////
//                              Association(permanente)
/////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////
//                              Association(ponctuelle)
/////////////////////////////////////////////////////////////////////////////////
