<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the entities persist across multiple steps');

$I->amOnPage('/doctrine/');
$I->seeResponseCodeIs(200);
$I->see('0 users in the table');

$I->fillField('name', 'John Doe');
$I->click('Create User');

$I->amOnPage('/doctrine/');
$I->see('1 users in the table');

$I->fillField('name', 'John Smith');
$I->click('Create User');

$I->amOnPage('/doctrine/');
$I->see('2 users in the table');

$I->seeInRepository('\Application\Entity\User', ['name' => 'John Doe']);