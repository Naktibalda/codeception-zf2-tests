<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test redirect');

$I->amOnPage('/redirect');

$I->seeCurrentUrlEquals('/doctrine');
$I->see('users in the table');
