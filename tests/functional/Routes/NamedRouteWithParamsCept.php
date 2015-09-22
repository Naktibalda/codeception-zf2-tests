<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test named route with parameters');

$I->amOnRoute('posts.show', ['id' => 5]);
$I->seeCurrentRouteIs('posts.show', ['id' => 5]);
$I->seeCurrentUrlEquals('/posts/5');
$I->see('Show Post #5');
