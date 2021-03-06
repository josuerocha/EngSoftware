<?php	
	require_once 'ACrudDAO.php';

    class SalaDAO extends ACrudDAO{

        function Save($sala){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($sala->getCode()==0){				
					$query = "insert into tbl_Sala (numero_Sala,descricao_Sala) values ({$sala->getNumero()},'{$sala->getDescricao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$sala->setCode($code);
				}else{	
					$query = "update tbl_Sala set numero_Sala = {$sala->getNumero()}, descricao_Sala = '{$sala->getDescricao()}' where cod_Sala = {$sala->getCode()}";
					echo $query;
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($sala){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Sala where cod_Sala = {$sala->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$salas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Sala";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$sala = new Sala();
					$sala->setCode($register['cod_Sala']);
					$sala->setNumero($register['numero_Sala']);
                    $sala->setDescricao($register['descricao_Sala']);
					array_push($salas, $sala);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $salas;
		}

        function getByCode($code){			
			try{
				$this->Connect();	
				$query = "select * from tbl_Sala where cod_Sala = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);
				$sala = new Sala();
				$sala->setCode($register['cod_Sala']);
				$sala->setNumero($register['numero_Sala']);
                $sala->setDescricao($register['descricao_Sala']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $sala;
            
        }
}
?>