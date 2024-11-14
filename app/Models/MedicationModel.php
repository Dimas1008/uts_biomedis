<?php
namespace App\Models;

use CodeIgniter\Model;

class MedicationModel extends Model {
    protected $table = 'medications';  // Sesuaikan nama tabel
    protected $primaryKey = 'id';      // Primary key
    protected $allowedFields = ['user_id', 'medication_name', 'dosage', 'frequency', 'duration', 'notes'];
}
