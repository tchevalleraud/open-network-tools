<?php
    namespace OpenNetworkTools\OpenConfig\Interfaces;
        
    class Unit {

        private $description;
        private $disable;
        private $family;

        public function __construct(){
            $this->disable = false;
        }

        public function setDescription($description){
            $this->description = $description;
            return $this;
        }

        public function getDisabled(){
            return $this->disable;
        }

        public function setDisable($disable){
            $this->disable = $disable;
            return $this;
        }

        public function setFamilyEthernetSwitching(){
            $this->family = new \OpenNetworkTools\OpenConfig\Interfaces\Unit\Family\EthernetSwitching();
            return $this->family;
        }

        public function setFamilyInet(){
            $this->family = new \OpenNetworkTools\OpenConfig\Interfaces\Unit\Family\Inet();
            return $this->family;
        }

    }