<?php
    class OpenConfigTests extends \PHPUnit\Framework\TestCase  {
    
        public function testOpenConfig(){
            $node = new \OpenNetworkTools\OpenConfig();
            $this->assertInstanceOf(\OpenNetworkTools\OpenConfig::class, $node);
        }
    
    }