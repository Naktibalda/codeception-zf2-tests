<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the user was persisted');
if (!method_exists('Zend\ServiceManager\ServiceManager', 'addPeeringServiceManager')) {
    $scenario->skip('This test is incompatible with ZF3');
}

$I->dontSeeInRepository('\Application\Entity\User', ['name' => 'John Doe']);

$I->amOnPage('/doctrine/');
$I->seeResponseCodeIs(200);
$I->fillField('name', 'John Doe');
$I->click('Create User');

$I->seeInRepository('\Application\Entity\User', ['name' => 'John Doe']);