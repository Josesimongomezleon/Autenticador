<?php
function Suma($N1,$N2){
	$Suma = $N1 + $N2;
	return "La suma es igual a:".$Suma;
}
function Producto($N1,$N2){
	$Producto = $N1 * $N2;
	return "El producto es igual a:".$Producto;
}
function Calcular($N1, $N2){
	$n1 = $N1;
	$n2 = $N2;

	if ($n2 == 0){
		return "No se puede dividir entre de 0";
	}	elseif ($n1 < 0 || $n2 <0){
		return "numero negativo";
	}	else {
			Suma($n1,$n2);
			Producto($n1,$n2);

			$Division = $n1 / $n2; 
			return "La division es igual a: $Division"."<br>";

			$Resta = $n1 + $n2; 
			return "La resta es igual a:    $Resta"."<br>";
		
	}
}
 

class UserTest extends \Codeception\Test\Unit{
    public function Calcular()    {
   		$this->assertEquals('numero negativo',Calcular(-1,1));
   		$this->assertEquals('numero negativo',Calcular(1,-1));
   		$this->assertEquals('No se puede dividir entre de 0',Calcular(-1,0));
    }
     public function Suma(){
        $this->assertEquals("La suma es igual a:"."12", Suma(5,7));
    }
    public function Producto(){
        $this->assertEquals("El producto es igual a:"."35", Producto(5,7));
    }
   
}

?>
