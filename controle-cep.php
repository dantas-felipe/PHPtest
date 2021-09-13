<?php

require_once 'conexao.php';

class ControleCep
{

    private $pdo;
    

    public function __construct($dbname, $host, $user, $password)
    {
        $c = new Conexao($dbname, $host, $user, $password);
        $this->pdo = $c->getPDO();
    }

    public function getCep($cep)
    {
        $res = array();
        $cep = $this->pdo->query("SELECT * FROM consulta WHERE cep= $cep");
        $res = $cep->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function addCep($bairro, $cep, $cidade, $complemento, $ddd, $estado, $rua)
    {

        $cep = $this->pdo->query("INSERT INTO consulta (bairro, cep, cidade, complemento, ddd, estado, rua ) VALUES ($bairro, $cep, $cidade, $complemento, $ddd, $estado, $rua)");
        //verificar se cep já foi cadastrado 
        // $cep = $this->pdo->query("SELECT cep FROM consulta where cep= $cep");
        // $cep->bindValue("cep", $cep);
        // $cep->execute();
            // if ($cep->rowCount() > 0) { //cep ja cadastrado
            //     return false;
            // } else {
                // $cep = $this->pdo->prepare("INSERT INTO consulta (bairro , cep, cidade , complemento, ddd, estado, rua ) VALUES (:b, :c, :l, :comp, :d, :e, :r)");
                // $cep->bindValue(":b", $bairro);
                // $cep->bindValue(":c", $cep);
                // $cep->bindValue(":l", $cidade);
                // $cep->bindValue(":comp", $complemento);
                // $cep->bindValue(":d", $ddd);
                // $cep->bindValue(":e", $estado);
                // $cep->bindValue(":r", $rua);
                // $cep->execute();

                // return true;
            // }    

    }

}

?>