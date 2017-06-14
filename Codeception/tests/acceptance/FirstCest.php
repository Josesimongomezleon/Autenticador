<?php


class FirstCest{
    public function _before(AcceptanceTester $I){
    }

    public function _after(AcceptanceTester $I){
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        //$I->click('LOGIN');
        //$I->see('Welcome, Davert!');
        $I->wantTo('log in as regular user');
        //vamos a la página login.php
        $I->amOnPage('/');
        //comprobamos que el título sea Login
        $I->seeInTitle('Login');
        //llenamos el campo username con el valor unodepiera
        $I->fillField('Username','unodepiera');
        //llenamos el campo password con el valor 123456
        $I->fillField('Password','123456');
        //pulsamos el enlace con el texto Login
        $I->click('Login');
        //comprobamos que exista la palabra Hello world
        $I->see('Hello world');
    }
}
