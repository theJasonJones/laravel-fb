<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for an account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username: ', 'MaryJane');
$I->fillField('Email: ', 'mj@example.com');
$I->fillField('Password: ', 'demo');
$I->fillField('Password Confirmation: ', 'demo');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');
$I->seeRecord('users', [
    'username' => 'MaryJane',
    'email' => 'mj@example.com'
]);
