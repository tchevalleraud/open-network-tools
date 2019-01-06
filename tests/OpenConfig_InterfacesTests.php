<?php
    class OpenConfig_InterfacesTests extends \PHPUnit\Framework\TestCase {

        public function testOpenConfig_Interface_instanceOf(){
            $interface = new \OpenNetworkTools\OpenConfig\Interfaces();
            $this->assertInstanceOf(\OpenNetworkTools\OpenConfig\Interfaces::class, $interface);
        }

        public function testOpenConfig_addInterface_withName(){
            $interface = new \OpenNetworkTools\OpenConfig\Interfaces();
            $openConf = new \OpenNetworkTools\OpenConfig();
            $openConf->addInterfaces("lo0");
            $this->assertEquals($interface, $openConf->getInterfaces("lo0"));
        }

        public function testOpenConfig_addInterface_withNameIsNull(){
            $openConf = new \OpenNetworkTools\OpenConfig();
            $this->expectException(\Exception::class);
            $openConf->addInterfaces(null);
        }

        public function testOpenConfig_addInterface_IfAlradyExist(){
            $interface = new \OpenNetworkTools\OpenConfig\Interfaces();
            $openConf = new \OpenNetworkTools\OpenConfig();
            $openConf->addInterfaces("lo0");
            $openConf->addInterfaces("lo0");
            $this->assertEquals($interface, $openConf->getInterfaces("lo0"));
        }

    }