<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if (null !==$session->get('is_loggedin')) { 
        $model = new usersModel();
        $permmodel = new RolePermissionModel();
     
        $data['records'] =$model->table('users')
        ->select('users.*,roles.id as rid,roles.role as rname')
        ->join('roles', 'roles.id = users.role_id')
        ->where('users.is_deleted',0)
        ->findAll();

        $data['permission'] =$permmodel->where('role_id',$session->get('role'))->where('permission.is_deleted',0)
        ->findAll();
        if(!empty($data['permission'])){
            $data['perm'] = explode(',',$data['permission'][0]['section_id']);
        }
        if(empty($data['records'])){
            $data['records'] =$model->where('is_deleted',0)->findAll();
        }
        return view('userlist',$data);
        }else{
            return redirect()->to(base_url('/login'));
        } 
    }

    public function form(){
        $session = session();
        if (null !==$session->get('is_loggedin')) { 
            $model = new RoleModel();
            $data['roles'] = $model->where('is_deleted',0)->findAll();
            return view('add-user',$data);
            }

         if (null ===$session->get('is_loggedin')) { 
            $model = new RoleModel();
            $data['roles'] = $model->where('is_deleted',0)->findAll();
            return view('form',$data);
          }
    }

    public function savedata(){
        $session = session();
        $rules = [
            'name' => 'required|max_length[30]',
            'email'    => 'required|max_length[254]|valid_email',
            'phone' => 'required|numeric|max_length[10]',
            'password' =>'required',
            'role'  =>'required'
        ];

        if(!$this->validate($rules)){
            $data['validation'] = $this->validator;
            $model = new RoleModel();
            $data['roles'] = $model->where('is_deleted',0)->findAll();
            if (null !==$session->get('is_loggedin')) { 
                return view('add-user', $data);
            }
            return view('form', $data);
        }else{ 
        $email = $this->request->getPost('email');
        $model = new usersModel();
        $data = $model->where('is_deleted',0)->where('email',$email)->findAll();
        if(!empty($data)){
            session()->setFlashdata('exist','Email already exist.............');
            return redirect()->to(base_url('/form'));

        }else{
            // as super admin
            $data = $model->where('is_deleted',0)->findAll();
            if(empty($data)){
                $name = $this->request->getPost('name');
                $phone = $this->request->getPost('phone');
                $password = $this->request->getPost('password');
                $role = $this->request->getPost('role');
                
        
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $phone,
                    'password' => $password,
                    'role_id' => $role
                );
               
                $model = new UsersModel();
                $save = $model->insert($data);
        
                if(isset($save)){
                    session()->setFlashdata('added','Record added successfully. Please Login.....');
                    return redirect()->to(base_url('/login'));
                }
            }
            // end super-admin

            $name = $this->request->getPost('name');
            $phone = $this->request->getPost('phone');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');
            
    
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'password' => $password,
                'role_id' => $role
            );
           
            $model = new UsersModel();
            $save = $model->insert($data);
    
            if(isset($save)){
    
                session()->setFlashdata('added','Record added successfully. Please Login.....');
             return redirect()->to(base_url('/form'));
            }
        }

    
    }
       
    }


    public function Edit($id=null){
         $model = new usersModel();

         $data['data'] = $model->where('id',$id)->where('is_deleted',0)->findAll()[0];
         $model = new RoleModel();
         $data['roles'] = $model->where('is_deleted',0)->findAll();
        return view('edit-user',$data);
    }

    public function updatedata($id=null){
        $session = session();
                $model = new usersModel();
                
                $rules = [
                    'name' => 'required|max_length[30]',
                    'email'    => 'required|max_length[254]|valid_email',
                    'phone' => 'required|numeric|max_length[10]',
                    'password' => 'required',
                    'role' => 'required'
                ];
                
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    $model = new usersModel();
                    $data['data'] = $model->where('id',$id)->where('is_deleted',0)->findAll()[0];
                    return view('edit-user', $data);
                }else{

                $model = new usersModel();
                $email = $this->request->getPost('email');
                
                $data = $model->where('id !=',$id)->where('is_deleted',0)->where('email',$email)->findAll();
                
                if(!empty($data)){
                    session()->setFlashdata('exist','Email already exist.............');
                    return redirect()->to(base_url('/edit/'.$id));
                }else{
                    $name = $this->request->getPost('name');
                    $phone = $this->request->getPost('phone');
                    $password = $this->request->getPost('password');
                    $role = $this->request->getPost('role');
                     $data = array(
                        'id' => $id,
                        'name' => $name,
                        'email' => $email,
                        'mobile' => $phone,
                        'password' => $password,
                        'role_id' => $role
                        
                     );
                     
                     $resonse = $model->where('is_deleted',0)->update($id,$data);
                     
                     if($resonse){
                         session()->setFlashdata('update','Record updated successfully..!');
                         return redirect()->to(base_url('edit/'.$id));
                     }else{
                        session()->setFlashdata('missing','Record is Missing..!');
                         return redirect()->to(base_url('edit/'.$id));
                     }
                }
              
                }
                 
    }

   public function remove($id=null){

           $data = array(
            'id' => $id,
            'is_deleted' => 1
           );

           $model = new usersModel();
           $resonse =  $model->where('is_deleted',0)->update($id,$data);

           if($resonse){
            session()->setFlashdata('deleted','Record Deleted successfully..!');
            return redirect()->to(base_url('/alldata'));
           }
   }







}
