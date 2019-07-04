<?php

/**
 * @group services
 */

$I = new FunctionalTester($scenario);
$I->wantTo('see that added service persists between requests');
if (!method_exists('Zend\ServiceManager\ServiceManager', 'addPeeringServiceManager')) {
    $scenario->skip('This test is incompatible with ZF3');
}

$I->addServiceToContainer('foo', (object)['bar' => 1]);
$I->amOnPage('/form');

$service = $I->grabServiceFromContainer('foo');
$I->assertSame(1, $service->bar);
