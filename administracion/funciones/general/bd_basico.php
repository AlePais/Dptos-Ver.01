<?php
	class bd_basico
	{
		private $operacion;
		private $tabla;
		private $consulta;
		private $clausulas;
		private $lista_campos;
		private $lista_valores;
		private $campos_valores;
		private $id_elemento;
		private $campos=array();
		private $valores=array();

		public function __construct($operacion, $tabla)
		{
			$this->operacion = $operacion;
			switch($this->operacion)
			{
				case 'insertar':
					$this->consulta = "INSERT INTO `".$tabla."` (";
					break;
				case 'modificar':
					$this->consulta = "UPDATE `".$tabla."` SET ";
					$this->clausulas = "WHERE ";
					break;
				case 'eliminar':
					$this->consulta = "DELETE FROM `".$tabla."` ";
					$this->clausulas = "WHERE ";
					break;
				case 'insertar_modificar':
					$this->consulta = "INSERT INTO `".$tabla."` (";
					$this->consulta_2 = "ON DUPLICATE KEY UPDATE ";
					break;
			}
		}

		public function agregar_dato($cam, $val)
		{
			if(isset($val))
			{
				$this->campos[]=$cam;
				$this->valores[]=$val;
			}
		}

		public function agregar_clausula($cam, $oper, $val)
		{
			if($this->clausulas!="WHERE ")
			{
				$this->clausulas = $this->clausulas." AND ";
			}
			
			$this->clausulas = $this->clausulas." `".$cam."` ".$oper." '".$val."'";
		}

		public function realizar_consulta($mysqli)
		{
			switch($this->operacion)
			{
				case 'insertar':
					$datos = array_combine($this->campos, $this->valores);
					foreach($datos as $campo=>$valor)
					{
						if(!is_null($this->lista_campos ) && !is_null($this->lista_valores ))
						{
							$this->lista_campos = $this->lista_campos.",";
							$this->lista_valores = $this->lista_valores.",";
						}
						$this->lista_campos = $this->lista_campos." `".$campo."`";
						$this->lista_valores = $this->lista_valores." '".$valor."'";
					}
					$this->query=$this->consulta.$this->lista_campos.") VALUES (".$this->lista_valores.")";
				break;
				case 'modificar':
					$datos = array_combine($this->campos, $this->valores);
					foreach($datos as $campo=>$valor)
					{
						if(!is_null($this->campos_valores))
						{
							$this->campos_valores = $this->campos_valores.", ";
						}
						$this->campos_valores = $this->campos_valores."`".$campo."`='".$valor."' ";
					}
					$this->query=$this->consulta.$this->campos_valores.$this->clausulas;
				break;
				//inserta salvo que ya exista el id (PRIMARY KEY), en ese caso modifica
				case 'insertar_modificar':
					$datos = array_combine($this->campos, $this->valores);
					foreach($datos as $campo=>$valor)
					{
						if(!is_null($this->lista_campos ) && !is_null($this->lista_valores ) && !is_null($this->campos_valores))
						{
							$this->lista_campos = $this->lista_campos.",";
							$this->lista_valores = $this->lista_valores.",";
							$this->campos_valores = $this->campos_valores.", ";
						}
						$this->lista_campos = $this->lista_campos." `".$campo."`";
						$this->lista_valores = $this->lista_valores." '".$valor."'";
						
						$this->campos_valores = $this->campos_valores."`".$campo."`='".$valor."' ";
					}
					$this->query=$this->consulta.$this->lista_campos.") VALUES (".$this->lista_valores.") ".$this->consulta_2.$this->campos_valores;
				break;
				case 'eliminar':
					$this->query=$this->consulta.$this->clausulas;
				break;
			}
			$mysqli->query($this->query);
			// echo ($this->query);
			$this->ultimo_id = $mysqli->insert_id;
			if($this->ultimo_id==0)
			{
				$this->ultimo_id = $mysqli->insert_id;
			}
		}
	}
?>
