<?php 
class Servidor {
	
	
	function  conectar(){
		if (!$conexion = mysqli_connect('localhost','root','','tiendaonline')){
			echo "No se pudo conectar a la base de datos";
			exit;
		}
		else{
			$sql = "SET NAMES 'utf8'";
			mysqli_query($conexion, $sql);
			return $conexion;
		}
	}
	
	
	
	function addCategoria(){
		
		
	}
	
	function addProducto(){
		
		
		
	}
	
	function getCategorias(){
		$conn = $this->conectar();
		$sql = "call getCategorias();";
		
		$stmts = $conn->prepare($sql);
		
		if ($stmts->execute()) {
			$json = array();
			$stmts->store_result();
			
			$stmts->bind_result($id, $nombre);
			
			
			while($stmts->fetch()) {
				$fila = array ('id' => $id,  'nombre' => $nombre);
				$json[] = $fila;
			}
			
			$conn->close();
			return $json;
			
			
		}
		
		else{
			$conn->close();
			return $conn->error;
		}
		
		
		
		
	}
		
		
		

	
	function getProductos(){
		$conn = $this->conectar();
		$sql = "call getProductos();";
		
		$stmts = $conn->prepare($sql);
		
		if ($stmts->execute()) {
			$json = array();
			$stmts->store_result();
			
			$stmts->bind_result($id, $codigo, $nombre, $costo, $precio, $descripcion, $categoria, $imagen,$nombreCategoria);
			
			
			while($stmts->fetch()) {
				$fila = array ('id' => $id, 'codigo' => $codigo, 'nombre' => $nombre, 'costo' => $costo, 'precio' => $precio, 'descripcion' => $descripcion,'categoria' => $categoria, 'imagen' => $imagen,'nombreCategoria' => $nombreCategoria);
				$json[] = $fila;
			}
			
			$conn->close();
			return $json;
			
		
		}
		
		else{
			$conn->close();
			return $conn->error;
		}
		
		
	
	
	}
	
	function getProductosByCategoria(){
		
		
	}
	
	
	

}


?>