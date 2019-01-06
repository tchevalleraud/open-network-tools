<?php
    namespace OpenNetworkTools\OpenConfig;
        
    class Interfaces {
    
        private $unit;

        /**
         * @param $id
         * @return \OpenNetworkTools\OpenConfig\Interfaces\Unit
         */
        public function addUnit($id, $unit = null){
            if(is_null($unit)) $this->unit[$id] = new \OpenNetworkTools\OpenConfig\Interfaces\Unit();
            else $this->unit[$id] = $unit;
            return $this->unit[$id];
        }

        public function getKeyFirstUnit(){
            return key($this->unit);
        }

        /**
         * @param $id
         * @return \OpenNetworkTools\OpenConfig\Interfaces\Unit
         */
        public function getUnit($id = null){
            if(!is_null($id)) return $this->unit[$id];
            else return $this->unit;
        }

    }
?>