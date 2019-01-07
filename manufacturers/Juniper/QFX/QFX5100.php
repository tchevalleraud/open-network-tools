<?php
    namespace OpenNetworkTools\Manufacturers\Juniper\QFX;
        
    class QFX5100 extends \OpenNetworkTools\Manufacturers\Juniper\QFX {

        public function __construct(){
            parent::__construct();
        }

        public function exportConfigFile(){
            //$this->exportConfigVlan();
            $this->exportRoutingInstances();
        }

        private function exportConfigVlan(){
            $vlans = $this->getOpenConfig()->getVlans();
            foreach ($vlans as $k => $v){
                $this->addConfigFileLine("set vlans ".$k." description ".$v->getDescription());
                $this->addConfigFileLine("set vlans ".$k." vlan-id ".$k);
            }
        }

        private function exportRoutingInstances(){
            $routingInstances = $this->getOpenConfig()->getRoutingInstances();
            if(!empty($routingInstances)){
                foreach ($routingInstances as $k => $v){
                    $this->addConfigFileLine("set routing-instances ".$k." instance-type ".$v->getInstanceType());
                    $this->addConfigFileLine("set routing-instances ".$k." route-distinguisher ".$v->getRouteDistinguisher());
                    if($v->getVRFTableLabel()) $this->addConfigFileLine("set routing-instances ".$k." vrf-table-label");
                }
            }
        }
    
    }
?>