<?php

namespace MyModuleTest;

use MyModule\Module;
use PHPUnit_Framework_TestCase;

class ModuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * This test should verify if module configuration works out of the box
     */
    public function testGetConfigReturnsValidConfig()
    {
        $module = new Module();
        $config = $module->getConfig();
        $this->assertInternalType('array', $config);
        $this->assertArrayHasKey('my_module', $config);
    }

    /**
     * Scans service manager configuration, returning all services created by factories and invokables
     * @return array
     */
    public function provideServiceList()
    {
        $config = include __DIR__ . '/../../config/module.config.php';
        $serviceConfig = array_merge(
            isset($config['service_manager']['factories'])?$config['service_manager']['factories']:array(),
            isset($config['service_manager']['invokables'])?$config['service_manager']['invokables']:array()
        );
        $services = array();
        foreach ($serviceConfig as $key => $val) {
            $services[] = array($key);
        }
        return $services;
    }

    /**
     * @dataProvider provideServiceList
     */
    public function testService($service)
    {
        $sm = Bootstrap::getServiceManager();
        $this->assertTrue($sm->has($service));
        $this->assertInstanceOf($service, $sm->get($service));
    }
}
