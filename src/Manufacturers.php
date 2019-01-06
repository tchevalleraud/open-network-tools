<?php
    namespace OpenNetworkTools;
        
    class Manufacturers {
    
        private $configCoverage;
        private $configFile;
        private $RunningFile;
        private $openConfig;
        private $openRunning;

        public function __construct(){
            $this->configCoverage   = new \OpenNetworkTools\Toolbox\ConfigCoverage();
            $this->openConfig       = new \OpenNetworkTools\OpenConfig();
            return $this;
        }

        public function getConfigCoverage(){
            return $this->configCoverage;
        }

        public function addConfigFileLine($line){
            $this->configFile[] = $line;
        }

        public function getConfigFile(){
            return $this->configFile;
        }

        public function loadConfigFile($filename, $ignoreComment = false, $ignoreSymbole = array()){
            try {
                $fh = fopen($filename, "r");
                if(!$fh) throw new \Exception();
                while(!feof($fh)){
                    $line = fgets($fh, 256);

                    if($ignoreComment == true && in_array($line[0], $ignoreSymbole));
                    else $this->configFile[] = $line;
                }
                $this->configCoverage->setSize(sizeof($this->configFile));
                $this->configCoverage->setConfigFile($this->configFile);
            } catch (\Exception $e){
                throw new \Exception();
            }
        }

        public function getOpenConfig(){
            return $this->openConfig;
        }

        public function setOpenConfig($openConfig){
            $this->openConfig = $openConfig;
        }

    }