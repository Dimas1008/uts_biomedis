<?php
namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model {
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'specialization', 'license_number', 'phone_number'];
}
