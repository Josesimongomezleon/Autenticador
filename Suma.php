<?php 
	

	$n1 = $_POST['N1'];
	$n2 = $_POST['N2'];

	if ($n1 <= 0){
		echo "numero negativo";
	}
	elseif ($n2 <= 0){
		echo "No se puede dividir entre de 0";
	}
	else {
			$Suma = $n1 + $n2; 
			echo "La suma es igual a:".$Suma."<br>";

			$Producto = $n1 * $n2; 
			echo "El producto es igual a: $Producto"."<br>";

			$Division = $n1 / $n2; 
			echo "La division es igual a: $Division"."<br>";

			$Resta = $n1 + $n2; 
			echo "La resta es igual a:    $Resta"."<br>";
		
	}

?>
