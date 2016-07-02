<?php

$I = new FunctionalTester($scenario);
$I->wantTo('override existing service');

$I->addServiceToContainer('foo', (object)['bar' => 1]);
$I->addServiceToContainer('foo', (object)['bar' => 2]);

$I->grabServiceFromContainer('foo');
