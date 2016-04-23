<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test two redirects performed in the same session');

$I->amOnPage('/redirect');
$I->seeCurrentUrlEquals('/doctrine');
$I->see('users in the table');

$I->amOnPage('/redirect');
$I->seeCurrentUrlEquals('/doctrine');
$I->see('users in the table');
