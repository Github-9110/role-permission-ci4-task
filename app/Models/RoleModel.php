<?php 

/**
 * Copyright  2022 Kraftors. All Right Reserved 
 * 
 * PHP version 7.4.28
 * 
 * @category Models
 * @package  Degreeassessment_For_Ci
 * @author   Mitali Srivastava <mitali@thekraftors.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://thekraftors.com
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class extends Model class
 * 
 * @category Model
 * @package  Degreeassessment_For_Ci
 * @author   Mitali Srivastava <mitali@thekraftors.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://thekraftors.com
 */


class RoleModel extends Model
{

    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $allowedFields = ['role','status','is_deleted' ,'created_by', 'updated_by'];
}
