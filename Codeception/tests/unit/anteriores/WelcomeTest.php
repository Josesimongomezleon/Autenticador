<?php

function welcome(){
	
	return 'Welcome guest!';
}

class WelcomeTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function Welcome()
    {
    	$this->assertEquals('Welcome guest!',welcome());

    }
}