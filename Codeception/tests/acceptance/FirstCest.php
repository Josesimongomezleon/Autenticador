<?php


class FirstCest{
    public function _before(AcceptanceTester $I){
    }

    public function _after(AcceptanceTester $I){
    }

    public function frontpageWorks(AcceptanceTester $I)
    {


        $I->wantTo('log in as regular user');

        $I->amOnPage('/');

        $I->seeInTitle('Login');

        $I->fillField('Username','unodepiera');

        $I->fillField('Password','123456');

        $I->click('Login');

    }
}
