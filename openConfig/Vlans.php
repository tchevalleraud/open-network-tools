<?php
    namespace OpenNetworkTools\OpenConfig;
        
    class Vlans {
    
        private $description;
        private $l3Interface;
        private $vlanId;

        public function __construct($vlanId){
            $this->setVlanId($vlanId);
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
            return $this;
        }

        public function getL3Interface(){
            if(is_object($this->l3Interface)){
                return("irb.".$this->l3Interface->getKeyFirstUnit());
            }
        }

        /**
         * @param $id
         * @param $node \OpenNetworkTools\OpenConfig
         */
        public function setL3Interface($id, $node){
            $irb = $node->getInterfaces("irb")->getUnit($id);
            $data = new \OpenNetworkTools\OpenConfig\Interfaces();
            $data->addUnit($id, $irb);
            $this->l3Interface = $data;
        }

        public function getVlanId(){
            return $this->vlanId;
        }

        public function setVlanId($vlanId){
            $this->vlanId = $vlanId;
            return $this;
        }

    }