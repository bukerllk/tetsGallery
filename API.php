<?php
include("lib/DB.php");
/**
* Clase para consumir API Rest
* Las operaciones soportadas son:
* 	
* 	- POST		: Agregar
* 	- GET		: Consultar
* 	- DELETE	: Eliminar
* 	- PUT		: Actualizar
* 	- PATCH		: Actualizar por parte
* 

*  	- Conversor JSON
 *
 * @author     	Eduard Russy 
 * @version 	1.0
 */
class API extends DB{

	public function __construct(){

	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
	 * Se utiliza para agregar datos en una API REST
	 *
	 * @param array $ARRAY parámetros a envíar
	 * @return JSON
	 */
	static function POST($ARRAY){
		/** 
		* Aqui va el codigo
		*/
	}

	/**
	 * Consultar a un servidor a través del protocolo HTTP (GET).
	 * Se utiliza para consultar recursos en una API REST
	 *
	 * @return JSON
	 */
	static function GET($user_id){
		$result = array();
		$query='select * from users where id='.$user_id;
		$user=parent::consultar($query);
		$result['user']=$user;
		$query='select * from images where user_id='.$user_id;
		$images=parent::consultar($query);
		$i = 0; 
		while ($fila = $images) {  
			$result['images'][$i]['name']= $fila['name']; 
			$result['images'][$i]['description']= $fila['description']; 
			$result['images'][$i]['date']= $fila['date']; 
			$result['images'][$i]['like']= $fila['like']; 
			$i++; 

		}
		return json_encode($result);
	}
	/**
	 * Consultar a un servidor a través del protocolo HTTP (DELETE).
	 * Se utiliza para eliminar recursos en una API REST
	 *
	 * @return JSON
	 */
	static function DELETE(){
		/** 
		* Aqui va el codigo
		*/
	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (PUT).
	 * Se utiliza para editar un recurso en una API REST
	 *
	 * @param array $ARRAY parámetros a envíar
	 * @return JSON
	 */
	static function PUT($ARRAY){
		/** 
		* Aqui va el codigo
		*/
	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (PATCH).
	 * Se utiliza para editar un atributo específico (recurso) en una API REST
	 *
	 * @param string $TOKEN token de autenticación
	 * @param array $ARRAY parametros parámetros a envíar
	 * @return JSON
	 */
	static function PATCH($ARRAY){
		/** 
		* Aqui va el codigo
		*/
	}

	/**
	 * Convertir JSON a un ARRAY
	 *
	 * @param json $json Formato JSON
	 * @return ARRAY
	 */
	static function JSON_TO_ARRAY($json){
		return json_decode($json,true);
	}
}
?>