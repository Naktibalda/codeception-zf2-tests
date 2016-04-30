<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test two redirects performed in a row');

$I->amOnPage('/redirect2');
$I->seeCurrentUrlEquals('/doctrine');
$I->see('users in the table');
