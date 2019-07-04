<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the user was persisted');

$I->dontSeeInRepository('\Application\Entity\User', ['name' => 'John Doe']);

$I->amOnPage('/doctrine/');
$I->seeResponseCodeIs(200);
$I->fillField('name', 'John Doe');
$I->click('Create User');
$I->see('1 users in the table');

$I->seeInRepository('\Application\Entity\User', ['name' => 'John Doe']);