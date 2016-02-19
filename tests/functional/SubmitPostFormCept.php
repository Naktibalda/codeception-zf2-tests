<?php
/**
 * @issue https://github.com/Codeception/Codeception/issues/2814
 */
$I = new FunctionalTester($scenario);
$I->wantTo('see that post parameters are passed correctly');

$I->amOnPage('/form');
$I->see('Param 1:');
$I->fillField('param1', 'foo');
$I->fillField('param2', 'bar');
$I->click('submit');

$I->seeCurrentUrlEquals('/form/post');
$I->see('Param 1: foo');
$I->see('Param 2: bar');