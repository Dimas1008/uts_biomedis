<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model {
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'birth_date', 'gender', 'address', 'phone_number'];
}
