<?php

$I = new FunctionalTester($scenario);

$I->am('Larabook member');
$I->wantTo('follow and unfollow other Larabook members');

// Setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

// I browse to the OtherUser's profile
$I->click('Browse Users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

// When I follow a user..
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow OtherUser');

// When I unfollow that user..
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');

