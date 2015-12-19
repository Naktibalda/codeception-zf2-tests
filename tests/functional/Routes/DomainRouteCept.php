<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test domain route');

$I->amOnPage('http://example.com');
$I->see('example index page');