<?php
    namespace OpenNetworkTools;

    /**
     * This class provides a single repository for configuring network devices.
     *
     * @author Thibault CHEVALLERAUD <tchevalleraud@interdata.fr>
     * @copyright 2018-2019
     * @license MIT
     * @license https://github.com/tchevalleraud/open-network-tools/blob/master/LICENSE.md
     */
    class OpenConfig {

        /**
         * @var mixed[] This variable contains all the interfaces of the equipment
         * @see OpenConfig\Interfaces
         */
        private $interfaces;

        /**
         * @var object This variable contains the system configuration
         * @see OpenConfig\System
         */
        private $system;

        /**
         * @var mixed[] This variable contains all vlans of the equipement
         * @see OpenConfig\Vlans
         */
        private $vlans;

        public function __construct(){
            $this->system       = new \OpenNetworkTools\OpenConfig\System();
        }

        /**
         * @param $name
         * @return \OpenNetworkTools\OpenConfig\Interfaces
         */
        public function addInterfaces($name){
            if(is_null($name)) throw new \Exception();
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
         * @todo update specific value
         * @todo update all vlans
         */
        public function setVlans($name){
            return $this->vlans[$name];
        }

    }