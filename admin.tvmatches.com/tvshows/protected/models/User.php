<?php
class User extends CActiveRecord
{       
        public $Flag;
       public static function model($className=__CLASS__)
       {
               return parent::model($className);
       }
       
       public function tableName()
       {
               return 'users';
       }
       public function primaryKey()
       {
               return 'id';
       }
       
      public function deleteUser($id)
      {
        $table = $this->tableName();
        $command = Yii::app()->db->createCommand();
        $command->delete($table, 'id=:id', array(':id'=>$id));
        return 1;
      }
      public function statusUpdate($id,$status)
     {
      $table = $this->tableName();
      $command = Yii::app()->db->createCommand();
      $command->update($table, array(
           'status'=>$status,
        ), 'id=:id', array(':id'=>$id));
     return 1;
    
  }

       
}

 
