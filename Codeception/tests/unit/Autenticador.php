s<?php


class AutenticadorTest extends \Codeception\Test\Unit
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

    public function testdb_loginCorrecto(){

        $this -> usuario -> insertarDatos();
        
        $this -> usuario = new Sesion($usuario, $contrasena); //correctos

        $this -> usuario = new Sesion($usuario, $contrasena); //incorrecto

        $this -> usuario = new Sesion($usuario, $contrasena); //usuario no registrado
        
        $this -> usuario -> cerrarSesion();
        $this -> assertEquals ( false ,   $this -> usuario -> conexion());        

    }

    public function testMandanLosDatosConsulta(){

        $this -> usuario = new Sesion($usuario,$contrasena);
        $this -> assertEquals ( true ,   $this -> usuario -> conexion());

    }

    public function testConexionCorrecta(){

        $this -> assertEquals ( true ,   $this -> usuario -> conexion());

    }
    public function testCerrarSesion(){

        $this -> usuario = new Sesion($usuario,$contrasena);
        $this -> usuario -> cerrarSesion();
        $this -> assertEquals ( false ,   $this -> usuario -> conexion());

    }

    public function testHistorialSesiones()
    {
        $this -> usuario = new Sesion($usuario,$contrasena);
        $this -> assertEquals ( 1 ,   $this -> usuario -> totalconexiones());

    }











}