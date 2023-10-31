<?php

namespace App\Controllers;

use App\Models\UsersModel;

use App\Models\RoleModel;
use App\Models\SectionModel;
use App\Models\RolePermissionModel;

class Roles extends BaseController
{

    public function addroles()
    {    
        $session = session();
        if (null !==$session->get('is_loggedin')) {
            $SectionModel = new SectionModel();
            $data['section'] = $SectionModel->findAll();
            return view('add-roles', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function insertroles()
    {
        $session = session();
        if (null !==$session->get('is_loggedin')) {
            $model = new RoleModel();
            $role    = $this->request->getPost('role');
            $section = $this->request->getPost('section');
            if($role=='' || empty($section)){
                session()->setFlashdata('Addition', 'Role and check permission Are Required!');
                return redirect()->to(base_url('add-roles'));
            }
            $createdby = $session->get('id');
            $updatedby = $session->get('id');
            $data = [
                'role'    => ucwords($role),
                'created_by'=> $createdby,
                'updated_by'=>$updatedby,
            ];
            
            $result = $model->insert($data);
            $RolePermissionModel = new RolePermissionModel();
            
            if (!empty($section)) {
                $sections = implode(",", $section);
            } else {
                $sections ='';
            }
            $data = [
            'role_id'       => $result,
            'section_id'    => $sections,
            ];  
            $session->set('modelsId',$data);    
            $result2 = $RolePermissionModel->insert($data);
            if ($result2) {
                session()->setFlashdata('Addition', 'Record Added Successfully!');
                return redirect()->to(base_url('role'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function role()
    {
           $session = session();
        if (null !==$session->get('is_loggedin')) {
           
            $model = new RoleModel();
            $data['posts'] = $model->where('is_deleted', 0)->findAll();

            $RolePermissionModel = new RolePermissionModel();
            $data['perms'] =$RolePermissionModel->table('permission')
            ->select('permission.*,roles.id,roles.role')
            ->join('roles', 'roles.id = permission.role_id')
            ->where('roles.is_deleted',0)
            ->findAll();

            $SectionModel = new SectionModel();
            if(!empty($data['perms'])){
                $data['perm'] = explode(',',$data['perms'][0]['section_id']);
                $data['sectionname'] = $SectionModel->whereIn('id',$data['perm'])->findAll(); 
                foreach($data['sectionname'] as $section){
                    $data['sections'][] = $section['section'];
                } 
                $data['permission']= implode(',',$data['sections']);
            }
            
            
            
            
            
            
            
            
            return view('role', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function deleteroles($id = null)
    { 
        $session = session();
        if (null !==$session->get('is_loggedin')) {
            $model = new RoleModel();
            $data = array('is_deleted' => 1);
            $data['roles'] = $model->update($id, $data);
            $RolePermissionModel = new RolePermissionModel();
            $selectpermission = $RolePermissionModel->where('role_id', $id)->first();
            $permissId = $selectpermission['id'];
            $data = array('is_deleted' => 1);
            $data['permission'] = $RolePermissionModel->update($permissId, $data);
           
            if ($data['permission']) {
                session()->setFlashdata('Deleted', 'Record Deleted Successfully!');
                return redirect()->to(base_url('role'));
                
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    
    
    
   
}