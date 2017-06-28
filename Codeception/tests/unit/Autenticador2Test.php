<?php

    function conexion(){
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "basePrueba";

        try {
            $conexion = new PDO('mysql:host=127.0.0.1;dbname=basePrueba', $user_db, $pass_db);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
            die();
        }
        return $conexion;
    }

    function login($conn,$user,$pass){
        $conexion=$conn;
        $username=$user;
        $tbl_name = "Usuarios";
        $sql = "SELECT password FROM $tbl_name WHERE username = '$username'";

        $result = $conexion->query($sql);
        $rows = $result->fetchAll();
        if ($rows==NULL) {
            return "usuario invalido";
        }else{
            foreach ($rows as $row) {
            $password=$row['password'];
            }
            if ($pass==$password) {
                return true;
            }else {
                return "contraseña invalida";
            }
        }
    }

    function CerrarSesion($conn){
        $conn=NULL;
        return $conn;
    }

   function registroSesion($conn,$id){
        $ban= false;
        $Registro="insert into Historial(Usuarios_id)VALUES(".$id.")";
        $stmt = $conn->prepare($Registro);
        if (!$stmt->execute()) {
            echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
            $ban=false;
        }
        else{
            $ban=true;
        }
        return $ban;

    }

    function CrearTablaServicio($conn){
        $ban= false;
        $createT="CREATE Table if not exists Servicios(
                    id  int(11) NOT NULL auto_increment,
                    Usuarios_id int(11) DEFAULT 0,
                    nombre varchar(20),
                    url varchar(30),
                    password varchar(20),
                    PRIMARY KEY (id)
                )";
        $stmt = $conn->prepare($createT);
        if (!$stmt->execute()) {
            echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
            $ban=false;
        }
        else{
            $ban=true;
        }
        return $ban;

    }

    function InsertaServicio($conn,$idU,$nom,$web,$contra){
        $ban= false;
        $Inserta="INSERT INTO Servicios(Usuarios_id, nombre, url, password) VALUES(".$idU." , '".$nom."' , '".$web."' , '".$contra."' )";
        $stmt = $conn->prepare($Inserta);
        if (!$stmt->execute()) {
            echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
            $ban=false;
        }
        else{
            $ban=true;
        }
        return $ban;
    }
    function EliminarServicio($conn,$idU,$nom){
        $ban= false;
        $Inserta="delete from Servicios where Usuarios_id=".$idU." and nombre= '".$nom."'";
        $stmt = $conn->prepare($Inserta);
        if (!$stmt->execute()) {
            echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
            $ban=false;
        }
        else{
            $ban=true;
        }
        return $ban;
    }

    function ModificarPass($conn,$idU,$nom,$contraU,$contra){
        $ban= false;
        $Confirmar="select password from Usuarios where id=".$idU;
        $result = $conn->query($Confirmar);
        $rows = $result->fetchAll();

        if ($rows==NULL) {
            return false;
        }
        else{
            foreach ($rows as $row) {
                $password=$row['password'];
            }
                
            if ($password==$contraU) {
                $actualizar="update Servicios set password='".$contra."' where Usuarios_id= ".$idU." and nombre='".$nom."'";
                $stmt = $conn->prepare($actualizar);
                if (!$stmt->execute()) {
                    echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
                    $ban=false;
                }
                else{
                    $ban=true;
                }
            }
        }
        return $ban;
    }

    function EliminarTabla($conn,$nombreT){
        $EliminaT="drop table ".$nombreT;
        $stmt = $conn->prepare($EliminaT);
        $stmt->execute();
    }

class Autenticador2Test extends \Codeception\Test\Unit{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before(){
    }

    protected function _after(){
    }

    // tests

    public function testConexionCorrecta(){

        $this -> assertFalse( false, conexion());

    }

    public function testdb_loginCorrecto(){

        $conn = conexion();
        $user = "Invitado";
        $pass = "1234";
        $this ->assertEquals( true, login($conn,$user,$pass));

    }
    public function testdb_loginContrasenaInvalida(){
        $conn = conexion();
        $user = "Invitado";
        $pass2 = "21234";
        $this ->assertEquals( "contraseña invalida",login($conn,$user,$pass2));
    }

    public function testdb_loginUsuarioInvalido(){
        $conn = conexion();
        $user2 = "x";
        $pass2 = "21234";
        $this ->assertEquals( "usuario invalido",login($conn,$user2,$pass2));
    }

    public function testdb_ResgitroHistorial(){
        $conn =  conexion();
        $x    =  NULL;
        $this -> assertEquals(true ,registroSesion($conn,7));
    }

    public function testCreartablaServicio(){
        $conn =  conexion();
        $this -> assertEquals(true ,CrearTablaServicio($conn));
    }

    public function testInsertarservicio(){
        $con =  conexion();
        $this -> assertEquals(true ,InsertaServicio($con,1,"escuela","www.utm.mx","hola"));
    }

    public function testEliminarservicio(){
        $con =  conexion();
        $this -> assertEquals(true , EliminarServicio($con,1,"escuela"));
    }

    public function testModificarContra(){
        $con =  conexion();
        $this -> assertEquals(true , ModificarPass($con,1,"escuela","1234","hola"));
    }

    





}