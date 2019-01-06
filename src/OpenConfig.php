<?php
    namespace OpenNetworkTools;

    class OpenConfig {

        private $interfaces;
        private $system;
        private $vlans;

        public function __construct(){
            $this->system       = new \OpenNetworkTools\OpenConfig\System();
        }

        /**
         * @param $name
         * @return \OpenNetworkTools\OpenConfig\Interfaces
         */
        public function addInterfaces($name){
            if(!is_object($this->interfaces[$name])) $this->interfaces[$name] = new \OpenNetworkTools\OpenConfig\Interfaces();
            return $this->interfaces[$name];
        }

        /**
         * @param $name
         * @return \OpenNetworkTools\OpenConfig\Interfaces
         */
        public function getInterfaces($name = null){
            if(!is_null($name)) return $this->interfaces[$name];
            else return $this->interfaces;
        }

        public function getSystem(){
            return $this->system;
        }

        public function setSystem(){
            return $this->system;
        }

        /**
         * @param $id
         * @param $name
         * @return \OpenNetworkTools\OpenConfig\Vlans
         */
        public function addVlan($id, $name = null){
            if($name == null) $name = $id;
            $this->vlans[$name] = new \OpenNetworkTools\OpenConfig\Vlans($id);
            return $this->vlans[$name];
        }

        public function deleteVlan($name){
            unset($this->vlans[$name]);
            return $this;
        }

        /**
         * @param null $name
         * @return \OpenNetworkTools\OpenConfig\Vlans
         */
        public function getVlans($name = null){
            if(!is_null($name)) return $this->vlans[$name];
            else return $this->vlans;
        }

        /**
         * @param $name
         * @return \OpenNetworkTools\OpenConfig\Vlans
         */
        public function setVlans($name){
            return $this->vlans[$name];
        }

    }