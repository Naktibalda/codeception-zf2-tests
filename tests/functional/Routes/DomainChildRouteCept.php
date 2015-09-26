<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test domain route');

$I->amOnPage('http://example2.com/posts-create');
$I->see('EXAMPLE2 CREATE POST');