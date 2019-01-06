<?php
    namespace OpenNetworkTools\OpenConfig\Interfaces\Unit\Family;
        
    class Inet {
    
        private $address;

        public function __construct(){
        }

        /**
         * @param $address
         * @return \OpenNetworkTools\OpenConfig\Interfaces\Unit\Family\Inet\Address
         */
        public function addAdress($address){
            $this->address[$address] = new \OpenNetworkTools\OpenConfig\Interfaces\Unit\Family\Inet\Address();
            return $this->address[$address];
        }

    }
?>