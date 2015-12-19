<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test subdomain route');

$I->amOnPage('http://test.example.com');
$I->see('SUBDOMAIN: test');