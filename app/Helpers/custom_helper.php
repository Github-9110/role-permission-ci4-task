<?php
use App\Models\UsersModel;
 function isLogged($email,$password){
         $model = new UsersModel();
         $data = $model->where('email',$email)->where('password',$password)->where('is_deleted',0)->find();
         
         if(isset($data) && !empty($data) ){
            return [
                'id' => $data[0]['id'],
                'email' => $data[0]['email'],
                'role' => $data[0]['role_id'],
                'is_loggedin' => true
            ];
         }
}

?>