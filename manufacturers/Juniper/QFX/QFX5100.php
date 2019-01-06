<?php
    namespace OpenNetworkTools\Manufacturers\Juniper\QFX;
        
    class QFX5100 extends \OpenNetworkTools\Manufacturers\Juniper\QFX {

        public function __construct(){
            parent::__construct();
        }

        public function exportConfigFile(){
            $this->exportConfigVlan();
        }

        private function exportConfigVlan(){
            $vlans = $this->getOpenConfig()->getVlans();
            foreach ($vlans as $k => $v){
                $this->addConfigFileLine("set vlans ".$k." description ".$v->getDescription());
                $this->addConfigFileLine("set vlans ".$k." vlan-id ".$k);
            }
        }
    
    }
?>