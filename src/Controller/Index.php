<?php 

namespace SavePets\Controller;

use SavePets\Model\Conexao;

class  Index extends Conexao{
    public function getInfo() : void
    {
        require_once __DIR__ . '/../../View/index.php';
    }
}