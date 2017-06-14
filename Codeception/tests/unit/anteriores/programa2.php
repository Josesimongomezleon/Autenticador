<?php

 
class Stack {
 
	private $stack;
	public function __construct(){
		$this->stack = array();
	}
	public function push($v){
		$this->stack[] = $v;
	}
	public function pop(){
		return array_pop($this->stack);
	}
	public function isEmpty(){
		return empty($this->stack);
	}
	public function length(){
		return count($this->stack);
	}
	public function peek(){
		return $this->stack[($this->length() - 1)];
	}
}

function esOperador($var){
	if ($var == "+" || $var == "-" || $var == "*"){
		return 1;
	}
	else{
		return 0;
	}
}

function esOperando($var){
	//if ($var == "0" || $var == "1" || $var=="2" || $var == "3" || $var=="4" || $var== "5"|| $var=="6" || $var=="7" || $var =="8" || $var=="9"){
	if (is_numeric($var)) {
		return 1;
	}
	else{
		return 0;
	}
}

function evaluar($op1,$op2,$simbolo){
	switch ($simbolo) {
		case '*':
			return $op2*$op1;
			break;
		case '+':
			return $op2+$op1;
			break;
		case '-':
			return $op2-$op1;
			break;
		
		default:
			return 0;
			break;
	}
}

function evaluarPos($cadena){
	$pila = new Stack();
	$i=0;
	$it =(substr($cadena,0,1));
	while (($it)!="$") {
		if (esOperando($it)==1) {
			$pila->push($it);
			//echo $it;
		}
		elseif (esOperador($it)==1) {
			$op2=$pila->pop();
			$op1=$pila->pop();
			$e = evaluar($op1,$op2,$it);
			$pila->push($e);
		}
		$i++;
		$it =(substr($cadena,$i,1));
	}
	$var2=0;
	$var2=$pila->pop();
	return $var2;
}

function acadena($pila){
	$cadena="";
	while (!$pila->isEmpty()){
		$var2=$pila->pop();
		$cadena= $cadena.$var2;
	}
	$cadena= $cadena."$";
	return $cadena;
}

function infTopos($cadena){
	$pila = new Stack();
	$posfijo = new Stack();
	$resultado = new Stack();
	$it =(substr($cadena,0,1));
	$i=0;

	while (($it)!="$") {
		if (esOperando($it)==1) {
			$posfijo->push($it);
		}
		elseif (esOperador($it)==1) {
			$pila->push($it);
		}
		$i++;
		$it =(substr($cadena,$i,1));
	}

	while (!$pila->isEmpty()){
		$var=$pila->pop();
		$posfijo->push($var);
	}
	$i=0;
	while (!$posfijo->isEmpty()){
		$var2=$posfijo->pop();
		$resultado->push($var2);
	}
	return $resultado;

}

function validar($cadena){
	$longitud=strlen($cadena);
	for ($i=0; $i <$longitud-1 ; $i++) { 
		if (esOperando($cadena[$i])==0 && esOperador($cadena[$i])==0) {
			echo "cadena invalida";
			return 0;
		}
	}
	return 1;
}

function comparar($expresion,$res){
	$posfija;
	$posfijaCadena;
	$resultado=0;
	if (validar($expresion)==0) {
		return false;
	}else{
		$expresion=$expresion."$";
		$posfija=infTopos($expresion);
		$posfijaCadena=acadena($posfija);
		$resultado=evaluarPos($posfijaCadena);
		if ($resultado==$res) {
			echo "verdadero";
			return true;
		}
	}

}






?>