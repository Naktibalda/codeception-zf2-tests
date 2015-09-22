<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test named route');

$I->amOnRoute('posts.create');
$I->seeCurrentRouteIs('posts.create');
$I->seeCurrentUrlEquals('/posts-create');
$I->see('Create Post');