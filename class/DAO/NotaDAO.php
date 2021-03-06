<?php	
	require_once 'ACrudDAO.php';

    class NotaDAO extends ACrudDAO{

        function Save($nota){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($nota->getCode()==0){		
					$query = "insert into tbl_Nota (cod_Aluno,disciplina_Nota,mid_Nota,final_Nota,oral_Nota,ano_Nota,semestre_Nota,situacao_Nota) values ({$nota->getCodeAluno()},'{$nota->getDisciplina()}',{$nota->getMid()},{$nota->getFinal()},{$nota->getOral()},{$nota->getAno()},{$nota->getSemestre()},'{$nota->getSituacao()}')";
                    $this->connection->query($query);					
					$code = $this->connection->insert_id;
					$nota->setCode($code);
				}else{	
					$query = "update tbl_Nota set cod_Aluno = {$nota->getCodeAluno()}, disciplina_Nota = '{$nota->getDisciplina()}',mid_Nota = {$nota->getMid()},final_Nota = {$nota->getFinal()},oral_Nota = {$nota->getOral()},ano_Nota = {$nota->getAno()},semestre_Nota = {$nota->getSemestre()},situacao_Nota = '{$nota->getSituacao()}' where cod_Nota = {$nota->getCode()}";
                    $this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($nota){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Nota where cod_Nota = {$nota->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$notas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Nota";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$nota = new Nota();
					$nota->setCode($register['cod_Nota']);
                    $nota->setCodeAluno($register['cod_Aluno']);
                    $nota->setDisciplina($register['disciplina_Nota']);
                    $nota->setMid($register['mid_Nota']);
                    $nota->setFinal($register['final_Nota']);
                    $nota->setOral($register['oral_Nota']);
                    $nota->setAno($register['ano_Nota']);
                    $nota->setSemestre($register['semestre_Nota']);
                    $nota->setSituacao($register['situacao_Nota']);
					array_push($notas, $nota);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $notas;
		}

        function ListById($code){
            $nota = new Nota();
            try{
				$this->Connect();	
				$query = "select * from tbl_Nota where cod_Nota = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);
                $nota->setCode($register['cod_Nota']);
                $nota->setCodeAluno($register['cod_Aluno']);
                $nota->setDisciplina($register['disciplina_Nota']);
                $nota->setMid($register['mid_Nota']);
                $nota->setFinal($register['final_Nota']);
                $nota->setOral($register['oral_Nota']);
                $nota->setAno($register['ano_Nota']);
                $nota->setSemestre($register['semestre_Nota']);
                $nota->setSituacao($register['situacao_Nota']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $nota;          
        }

        function ListByAluno($codeAluno){
            $nota = new Nota();
            try{
				$this->Connect();	
				$query = "SELECT * FROM tbl_Nota WHERE cod_Aluno = {$codeAluno}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);
                $nota->setCode($register['cod_Nota']);
                $nota->setCodeAluno($register['cod_Aluno']);
                $nota->setDisciplina($register['disciplina_Nota']);
                $nota->setMid($register['mid_Nota']);
                $nota->setFinal($register['final_Nota']);
                $nota->setOral($register['oral_Nota']);
                $nota->setAno($register['ano_Nota']);
                $nota->setSemestre($register['semestre_Nota']);
                $nota->setSituacao($register['situacao_Nota']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $nota;          
        }

        function getAvailableYears(){
        	$anos = array();
        	try{
				$this->Connect();	
				$query = "SELECT ano_Nota FROM tbl_Nota";
				$result = $this->connection->query($query);	
				$this->Disconnect();


				$register = mysqli_fetch_assoc($result);

                $ano = $register['ano_Nota'];

                array_push($anos,$ano);
				$result->close();			

			}

			catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $anos;     

        }
}
?>

