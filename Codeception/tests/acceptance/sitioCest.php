<?php


class sitioCest{

    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->wantTo('ver la pagina de home con mis servicios');

        $I->amOnPage('/home.html');

        $I->seeInTitle('Home');

        $I->click('home');

    }
}
