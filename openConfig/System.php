<?php
    namespace OpenNetworkTools\OpenConfig;

    class System {

        private $hostName;
        private $timeZone;

        public function __construct(){
            $this->setTimeZone("UTC");
        }

        public function getHostName(){
            return $this->hostName;
        }

        public function setHostName($hostname){
            $this->hostName = $hostname;
            return $this;
        }

        public function getTimeZone(){
            return $this->timeZone;
        }

        public function setTimeZone($timezone){
            $this->timeZone = $timezone;
            return $this;
        }

    }