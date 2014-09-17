<?php 
$I = new FunctionalTester($scenario);
$I->am('larabook member');
$I->wantTo('Login to my larabook account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
$I->assertTrue(Auth::check());