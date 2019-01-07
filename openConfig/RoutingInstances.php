<?php
    namespace OpenNetworkTools\OpenConfig;

    class RoutingInstances {

        private $instanceType;
        private $routeDistinguisher;
        private $vrfTableLabel;

        public function __construct(){
            $this->disableVRFTableLabel();
        }

        public function getInstanceType(){
            return $this->instanceType;
        }

        public function setInstanceType($instanceType){
            $this->instanceType = $instanceType;
            return $this;
        }

        public function getRouteDistinguisher(){
            return $this->routeDistinguisher;
        }

        public function setRouteDistinguisher($ip, $id){
            $this->routeDistinguisher = $ip.":".$id;
            return $this;
        }

        public function getVRFTableLabel(){
            return $this->vrfTableLabel;
        }

        public function enableVRFTableLabel(){
            $this->vrfTableLabel = true;
        }

        public function disableVRFTableLabel(){
            $this->vrfTableLabel = false;
        }

    }