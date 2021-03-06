<?php	
	require_once 'ACrudDAO.php';

    class TipoContaDAO extends ACrudDAO{

        function Save($tipoConta){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($tipoConta->getCode()==0){				
					$query = "insert into tbl_TipoConta (tipo_TipoConta) values ('{$tipoConta->getTipo()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$tipoConta->setCode($code);
				}else{	
					$query = "update tbl_TipoConta set tipo_TipoConta = '{$tipoConta->getTipo()}' where cod_TipoConta = {$tipoConta->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($tipoConta){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_TipoConta where cod_TipoConta = {$tipoConta->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$tipoContas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_TipoConta";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$tipoConta = new TipoConta();
					$tipoConta->setCode($register['cod_TipoConta']);
                    $tipoConta->setTipo($register['tipo_TipoConta']);
					array_push($tipoContas, $tipoConta);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $tipoContas;
		}

        function getByCode($code){
			try{
				$this->Connect();	
				$query = "select * from tbl_TipoConta where cod_TipoConta = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);
				$tipoConta = new TipoConta();
				$tipoConta->setCode($register['cod_TipoConta']);
                $tipoConta->setTipo($register['tipo_TipoConta']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $tipoConta;
            
        }
}
?>