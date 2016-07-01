<?php
/**
 * @issue https://github.com/Codeception/Codeception/issues/2814
 */
$I = new FunctionalTester($scenario);
$I->wantTo('see that added service persist between requests');

$I->addServiceToContainer('foo', (object)['bar' => 1]);
$I->amOnPage('/form');

$I->grabServiceFromContainer('foo');
