<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
class LoginController extends BaseController
{
    public function __construct(){
        helper(['custom']);
    }

    public function userdata(){
        
        $session = session();
        if (null !==$session->get('is_loggedin')) { 
            $model = new usersModel();
            $data['records'] = $model->where('is_deleted',0)->where('id',$session->get('id'))->findAll()[0];
            return view('dashboard',$data);
         }{
            return redirect()->to('/login');
         }
       
    }
    public function loginform(){
        $session = session();
        
        if (null ===$session->get('is_loggedin')) { 
           
        return view('loginform');
        }
        if (null !==$session->get('is_loggedin')) { 
          return redirect()->to('alldata');
        }
        
    }

    public function logindata(){
        $session = session();
        $rules = [
            
            'email'    => 'required|max_length[254]|valid_email',
            'password' => 'required',
        ];

        if(!$this->validate($rules)){
            $data['validation'] = $this->validator;
            return view('loginform', $data);
        }else{ 
             $email = $this->request->getPost('email');
             $password = $this->request->getPost('password');
             
             $data = isLogged($email,$password);
              $session->set($data);
             
             if(isset($data) && !empty($data)){
                 return redirect()->to(base_url('alldata'));
             }else{
                 return redirect()->to(base_url('/login'));
             }
        }
     
    
    }

    public function logout(){
       
        $session = session();
        if(null !== $session->get('is_loggedin')){
             $session->destroy();
             return redirect()->to(base_url('login'));
        }else{
            return redirect()->to(base_url('login'));
        }

        
    }
}