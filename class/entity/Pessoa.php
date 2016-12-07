<?php
class Pessoa{
    private $code;
    private $fkPerfil;
    private $nome;
    private $cpf;
    private $endereco;
    private $telefone;
    private $celular;
    private $email;
    private $dataNascimento;
    private $sexo;
    private $horaAula;
    private $foto;

    function __construct(){
        $this->setCode(0);
        $this->nome = 0;
        $this->setHoraAula(0);
        $this->setFoto("noimg.png");
    }

    function getCode(){
        return $this->code;
    }

    function setCode($code){
        $this->code = $code;
    }

    function getFKPerfil(){
        return $this->fkPerfil;
    }

    function setFKPerfil($fkPerfil){
        $this->fkPerfil = $fkPerfil; 
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    function getCPF(){
        return $this->cpf;
    }

    function setCPF($cpf){
        $this->cpf = $cpf;
    }

    function getEndereco(){
        return $this->endereco;
    }

    function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    function getTelefone(){
        return $this->telefone;
    }

    function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    function getCelular(){
        return $this->celular;
    }

    function setCelular($celular){
        $this->celular = $celular;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getDataNascimento(){
        return $this->dataNascimento;
    }

    function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    function getSexo(){
        return $this->sexo;
    }

    function setSexo($sexo){
        $this->sexo = $sexo;
    }

    function getHoraAula(){
        return $this->horaAula;
    }

    function setHoraAula($horaAula){
        $this->horaAula = $horaAula;
    }

    function getFoto(){
        return $this->foto;
    }

    function setFoto($foto){
        $this->foto = $foto;
    }

    function toArray(){
    return array(
        'code' => $this->getCode(),
        'perfil' => $this->getFKPerfil(),
        'nome' => $this->getNome(),
        'cpf' => $this->getCPF(),
        'endereco' => $this->getEndereco(),
        'telefone' => $this->getTelefone(),
        'celular' => $this->getCelular(),
        'email' => $this->getEmail(),
        'dataNascimento' => $this->getDataNascimento(),
        'sexo' => $this->getSexo(),
        'horaAula' => $this->getHoraAula(),
        'foto' => $this->getFoto(),
    );
}
}
?>