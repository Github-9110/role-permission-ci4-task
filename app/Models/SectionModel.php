<?php 


namespace App\Models;

use CodeIgniter\Model;

class SectionModel extends Model
{


    protected $table = 'modules';

    protected $primaryKey = 'id';

    protected $allowedFields = ['section'];


}
