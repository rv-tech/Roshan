<?php
class Excel extends CActiveRecord
{       
       // public $Flag;
       public static function model($className=__CLASS__)
       {
               return parent::model($className);
       }
       
       public function tableName()
       {
               return 'excel';
       }
       public function primaryKey()
       {
               return 'id';
       }
       
     

       
}

 
