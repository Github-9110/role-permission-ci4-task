<?php 


namespace App\Models;

use CodeIgniter\Model;



class RolePermissionModel extends Model
{

    protected $table = 'permission';

    protected $primaryKey = 'id';

    protected $allowedFields = ['role_id', 'section_id', 'is_deleted'];

}
