<?php

/**
 * @group services
 */

$I = new FunctionalTester($scenario);
$I->wantTo('see that added service persists between requests');

$I->addServiceToContainer('foo', (object)['bar' => 1]);
$I->amOnPage('/form');

$service = $I->grabServiceFromContainer('foo');
$I->assertSame(1, $service->bar);
