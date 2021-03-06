<?php
    namespace OpenNetworkTools\Manufacturers\ExtremeNetworks\Switching;
        
    class ERS extends \OpenNetworkTools\Manufacturers\ExtremeNetworks\Switching {

        public function __construct(){
            parent::__construct();
        }

        protected function explodeVlan($line = ""){
            $vlans = array();
            foreach (explode(",", $line) as $v){
                if(preg_match("#([0-9]+)-([0-9]+)#", $v, $match)){
                    for($i=$match[1]; $i<=$match[2]; $i++) $vlans[] = $i;
                } else $vlans[] = $v;
            }
            return $vlans;
        }

        protected function implodeVlan($vlans = array()){
            return "";
        }
    
    }
?>