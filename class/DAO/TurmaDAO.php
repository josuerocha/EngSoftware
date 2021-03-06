<?php	
	require_once 'ACrudDAO.php';

    class TurmaDAO extends ACrudDAO{

        function Save($turma){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($turma->getCode()==0){				
					
					$query = "insert into tbl_Turma (tbl_Sala_numero_Sala,tbl_Idioma_cod_Idioma,descricao_Turma,horario_Turma) values ({$turma->getSala()},{$turma->getIdioma()},'{$turma->getDescricao()}','{$turma->getHorario()}')";

					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$turma->setCode($code);
				}

				else{	
					$query = "update tbl_Turma set tbl_Sala_numero_Sala = '{$turma->getSala()}',tbl_Idioma_cod_Idioma = '{$turma->getIdioma()}',descricao_Turma = '{$turma->getDescricao()}',horario_Turma = '{$turma->getHorario()}' where cod_Turma = {$turma->getCode()}";
					$this->connection->query($query);
				}

				$this->Disconnect();
			}

			catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($turma){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Turma where cod_Turma = {$turma->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }

            catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }

            return $situation;
        }

        function ListAll(){
			$turmas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Turma";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$turma = new Turma();
					$turma->setCode($register['cod_Turma']);
                    $turma->setSala($register['tbl_Sala_numero_Sala']);
                    $turma->setIdioma($register['tbl_Idioma_cod_Idioma']);
                    $turma->setDescricao($register['descricao_Turma']);
                    $turma->setHorario($register['horario_Turma']);
					array_push($turmas, $turma);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $turmas;
		}

		function getByCode($code){		
			try{
				$this->Connect();	
				$query = "select * from tbl_Turma where cod_Turma = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();

				$register = mysqli_fetch_assoc($result);
				$turma = new Turma();
				$turma->setCode($register['cod_Turma']);
                $turma->setSala($register['tbl_Sala_numero_Sala']);
                $turma->setIdioma($register['tbl_Idioma_cod_Idioma']);
                $turma->setDescricao($register['descricao_Turma']);
                $turma->setHorario($register['horario_Turma']);
				$result->close();
			}
			
			catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $turma;
		}

}
?>