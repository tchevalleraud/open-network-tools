<?php
        
    class OpenConfig_VlansTests extends \PHPUnit\Framework\TestCase {
    
        public function testOpenConfig_Vlans_instanceOf(){
            $vlan = new \OpenNetworkTools\OpenConfig\Vlans(10);
            $this->assertInstanceOf(\OpenNetworkTools\OpenConfig\Vlans::class, $vlan);
        }
    
    }
?>