<?php
    class OpenConfig_InterfacesTests extends \PHPUnit\Framework\TestCase {

        public function testOpenConfig_Interface(){
            $interface = new \OpenNetworkTools\OpenConfig\Interfaces();
            $this->assertInstanceOf(\OpenNetworkTools\OpenConfig\Interfaces::class, $interface);
        }

    }