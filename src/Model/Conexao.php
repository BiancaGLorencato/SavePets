<?php

namespace SavePets\Model;

use PDO;
use mysqli;
use Exception;
use PDOException;

class Conexao{

    private $server;

    private $userDb;

    private $password;

    private $databaseName;

    private function setServer($server)
    {
        $this->server = $server;
    }

    private function getServer(){
        return $this->server;
    }

    private function setUserDb($userDb)
    {
        $this->userDb = $userDb;
    }

    private function getUserDB(){
        return $this->userDb;
    }

    
    private function setPasswrd($password)
    {
        $this->password = $password;
    }

    private function getPassword(){
        return $this->password;
    }

    private function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    private function getDatabaseName(){
        return $this->databaseName;
    }

    public function __construct()
    {
        $this->setServer($_ENV["SERVER"]);
        $this->setUserDb($_ENV["USERDB"]);
        $this->setPasswrd($_ENV["PASSWORD"]);
        $this->setDatabaseName($_ENV["DATABASE"]);

        try{
            //$conexao = new mysqli ($this->getServer(), $this->getUserDB(), $this->getPassword(), $this->getDatabaseName());
            $conexao = new PDO('mysql:host='.$this->getServer().';dbname='.$this->getDatabaseName(), $this->getUserDB(), $this->getPassword());
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $i){
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
}

