<?php
namespace TDR\DAL{
use \PDO;

 class Crud extends PDO{

   public      $TipoDatabase='mysql';
   protected   $EnderecoDB='localhost';
   protected     $banco='TrilhosDoRio';
   protected    $usuariodb='root';
   protected   $senhadb='784512';
   protected   $tabela="";
 
  public function __construct()
  {
         try
         {
          parent::__construct($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);
 
         }
         catch(\PDOException $e)
         {
         echo $e->getMessage();
 
         }
  }

 }
}

?>