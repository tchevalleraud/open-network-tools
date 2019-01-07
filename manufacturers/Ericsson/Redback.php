<?php
    namespace OpenNetworkTools\Manufacturers\Ericsson;
        
    class Redback extends \OpenNetworkTools\Manufacturers\Ericsson {

        public function __construct(){
            parent::__construct();
        }

        public function analyseConfigFile(){
            if(!empty($this->getConfigFile())){
                foreach ($this->getConfigFile() as $k => $v){
                    $this->analyseContext($k, $v);
                }
            }
        }

        private function analyseContext($key, $line){
            if(preg_match("#^context (.*) vpn-rd ([0-9.]+):([0-9]+)#", $line, $match)){
                $this->getOpenConfig()->addRoutingInstances($match[1])->setInstanceType("vrf")
                                                                      ->setRouteDistinguisher($match[2],$match[3]);
                $this->getConfigCoverage()->addCover($key);
            }
        }
    
    }
?>