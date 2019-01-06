<?php
    namespace OpenNetworkTools\Toolbox;
        
    class MigrateConfig {

        /**
         * @var \OpenNetworkTools\OpenConfig
         */
        private $openConfig;
    
        public function __construct($openConfig){
            $this->openConfig = $openConfig;
        }

        public function test($output){
            $this->openConfig->getSystem()->setHostName($output);
            return $this;
        }

    }
?>