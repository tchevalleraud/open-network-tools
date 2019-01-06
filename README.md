# Open Network Tools
[![GitHub](https://img.shields.io/github/license/tchevalleraud/open-network-tools.svg?style=plastic)](https://github.com/tchevalleraud/open-network-tools/blob/master/LICENSE.md)

Services | Master
--- | :---: 
Travis Build | [![Travis (.org) branch](https://img.shields.io/travis/tchevalleraud/open-network-tools/master.svg?style=plastic)](https://travis-ci.org/tchevalleraud/open-network-tools/branches) 
Coveralls (coverage) | [![Coveralls github branch](https://img.shields.io/coveralls/github/tchevalleraud/open-network-tools/master.svg?style=plastic)](https://coveralls.io/github/tchevalleraud/open-network-tools)
Codacy (code quality) | [![Codacy branch grade](https://img.shields.io/codacy/grade/36c0fe7ce20f442a939689f793b197be/master.svg?style=plastic)](https://app.codacy.com/project/tchevalleraud/open-network-tools/dashboard)
CodeFactor (code quality) | [![CodeFactor](https://www.codefactor.io/repository/github/tchevalleraud/open-network-tools/badge/master?style=plastic)](https://www.codefactor.io/repository/github/tchevalleraud/open-network-tools/overview/master)
Scrutinizer (code quality) | [![Scrutinizer branch](https://img.shields.io/scrutinizer/g/tchevalleraud/open-network-tools/master.svg?style=plastic)](https://scrutinizer-ci.com/g/tchevalleraud/open-network-tools/)

## About this project
## Documentation
## How to use
### Example of use (OpenConfig)
__Script in PHP :__
```php
$config = new \OpenNetworkTools\OpenConfig();
$config->getSystem()->setHostName("SW01");
$config->addInterfaces("irb")->addUnit(10)->setDescription("L3Interface for VLAN10");
$config->addVlan(10)->setDescription("SERVEUR_10")->setL3Interface(10, $config);
$config->addVlan(20, "test");

$cli = new \OpenNetworkTools\Toolbox\CLIOpenConfig($config);
$cli->printCLI();
```
__Result of the script :__
```bash
interfaces:
  - irb:
    unit:
      - 10:
        description: "L3Interface for VLAN10"
system:
  host-name: SW01
  time-zone: UTC
vlans:
  - 10:
    description: SERVEUR_10
    l3-interface: irb.10
    vlan-id: 10
  - test:
    vlan-id: 20

```
### Exemple of configuration migration usage (ExtremeNetworks -> Juniper)
__Configuration file :__
```bash
vlan create 10-12,20,30-31
vlan name 1 "VLAN_1"
vlan name 10 "SERVEUR_10"
vlan name 11 "SERVEUR_11"
vlan name 12 "SERVEUR_12"
vlan name 20 "ADMIN"
vlan name 30 "SQL_30"
vlan name 31 "SQL_31"
```
__Script in PHP :__
```php
$node1 = new \OpenNetworkTools\Manufacturers\ExtremeNetworks\Switching\ERS\ERS5500();
$node1->loadConfigFile("./scripts/ressources/config.cfg", true, array("!", "\n"));
$node1->analyseConfigFile();
$node1->getConfigCoverage()->CLIReport(true)

$node2 = new \OpenNetworkTools\Manufacturers\Juniper\QFX\QFX5100();
$node2->setOpenConfig($node1->getOpenConfig());
$node2->exportConfigFile();
$node2->saveConfigFile("./scripts/ressources/QFXConfig.conf");
```
__Result of the script :__
```bash
$ php scripts/script1.php
=============================
 ConfigCoverage Report
=============================
 Cover : 8
 Size  : 8
=============================
 Ratio : 100%
=============================
  ✔  | vlan create 10-12,20,30-31 type port 1
  ✔  | vlan name 1 "VLAN_1"
  ✔  | vlan name 10 "SERVEUR_10"
  ✔  | vlan name 11 "SERVEUR_11"
  ✔  | vlan name 12 "SERVEUR_12"
  ✔  | vlan name 20 "ADMIN"
  ✔  | vlan name 30 "SQL_30"
  ✔  | vlan name 31 "SQL_31"
```
__Contents of the QFXConfig.conf file :__
```bash
set vlans 1 description VLAN_1
set vlans 1 vlan-id 1
set vlans 10 description SERVEUR_10
set vlans 10 vlan-id 10
set vlans 11 description SERVEUR_11
set vlans 11 vlan-id 11
set vlans 12 description SERVEUR_12
set vlans 12 vlan-id 12
set vlans 20 description ADMIN
set vlans 20 vlan-id 20
set vlans 30 description SQL_30
set vlans 30 vlan-id 30
set vlans 31 description SQL_31
set vlans 31 vlan-id 31
```
## Contributors
  - [Thibault CHEVALLERAUD](https://github.com/tchevalleraud/)