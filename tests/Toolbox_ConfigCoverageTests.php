<?php
    class Toolbox_ConfigCoverageTests extends \PHPUnit\Framework\TestCase {
    
        public function testTooboxConfigCoverage(){
            $ToolboxConfigCoverage = new \OpenNetworkTools\Toolbox\ConfigCoverage();
            $this->assertInstanceOf(\OpenNetworkTools\Toolbox\ConfigCoverage::class, $ToolboxConfigCoverage);
        }
    
    }