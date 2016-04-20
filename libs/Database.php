<?php

	Class Database extends PDO{
		public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
			parent:: __construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		}

		public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
			/*Permite sólo caracteres válidos en una consulta, evitando así inyecciones SQL*/
			$sentencia = $this->prepare($sql);
			
			
			foreach($array as $key=>$value){
				$sentencia->bindValue("$key", $value);
			}
			
			$sentencia->execute();
			return $sentencia->fetchAll($fetchMode);
		}

		public function insert($table, $data){
			ksort($data);

			$fieldNames = implode('`, `', array_keys($data));
			$fieldValues = ':' . implode(', :', array_keys($data));
			
			$sentencia = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
			
			foreach($data as $key=>$value){
				$sentencia->bindValue(":$key", $value);
			}
			/* return $sentencia; */
			return $sentencia->execute();

		}

		public function update($table, $data, $where){
			/* return var_dump($data).'tabla = '.$table.'condicion = '. $where; */
		
			ksort($data);

			$fieldDetails = NULL;
			foreach($data as $key=>$value){
				$fieldDetails .= "$key=:$key,";
			}

			$fieldDetails = rtrim($fieldDetails, ',');

			/* return "UPDATE $table SET $fieldDetails WHERE $where"; */
			$sentencia = $this->prepare("UPDATE $table SET $fieldDetails $where");
			/* return $sentencia; */

			foreach($data as $key=>$value){
				$sentencia->bindValue(":$key", $value);
			}

			/* return $sentencia; */

			return $sentencia->execute();
		}

		public function delete($table, $where, $limit = 1){
			return $this->exec("DELETE FROM $table WHERE $where LIMI $limit");
		}
	}

?>