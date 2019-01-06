<?php
    namespace OpenNetworkTools\Toolbox;
        
    class CLIOpenConfig {

        private $data;
        private $indent;
        private $indentText = "";
        private $openConfig;

        public function __construct($openConfig, $indent = 2){
            $this->setOpenConfig($openConfig);
            $this->setIndent($indent);
            $this->dumper();
            return $this;
        }

        public function dumper(){
            $this->dumperInterfaces();
            $this->dumperSystem();
            $this->dumperVlans();
        }

        private function dumperInterfaces(){
            $this->data[] = "interfaces:";
            foreach ($this->getOpenConfig()->getInterfaces() as $k => $v){
                $this->data[] = $this->getIndentText()."- ".$k.":";
                $this->data[] = $this->getIndentText(2)."unit:";
                foreach ($v->getUnit() as $l => $w){
                    $this->data[] = $this->getIndentText(3)."- ".$l.":";
                }
            }
        }

        private function dumperSystem(){
            $this->data[] = "system:";
            $this->data[] = $this->getIndentText()."host-name: ".$this->getOpenConfig()->getSystem()->getHostName();
            $this->data[] = $this->getIndentText()."time-zone: ".$this->getOpenConfig()->getSystem()->getTimeZone();
        }

        private function dumperVlans(){
            $this->data[] = "vlans:";
            foreach ($this->getOpenConfig()->getVlans() as $k => $v){
                $this->data[] = $this->getIndentText()."- ".$k.":";
                $this->data[] = $this->getIndentText(2)."description: ".$v->getDescription();
                $this->data[] = $this->getIndentText(2)."l3-interface: ".$v->getL3Interface();
                $this->data[] = $this->getIndentText(2)."vlan-id: ".$v->getVlanId();
            }

        }

        public function printCLI(){
            foreach ($this->data as $v){
                echo $v."\n";
            }
        }

        public function getData(){
            return $this->data;
        }

        public function getIndentText($size = 1){
            $data = "";
            for($i=0; $i<$size; $i++)$data=$data.$this->indentText;
            return $data;
        }

        public function setIndent($indent){
            $this->indent = $indent;
            for($i=0;$i<$this->indent;$i++) $this->indentText = $this->indentText." ";
            return $this;
        }

        /**
         * @return \OpenNetworkTools\OpenConfig
         */
        public function getOpenConfig(){
            return $this->openConfig;
        }

        public function setOpenConfig($openConfig){
            $this->openConfig = $openConfig;
            return $this;
        }

    }
?>