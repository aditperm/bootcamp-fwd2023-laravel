<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //declare table
     public $table = 'transaction'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'appointment_id',
         'fee_doctor',
         'fee_specialist',
         'fee_hospital',
         'sub_total',
         'vat',
         'total',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     public function appointment(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\Operational\Appointment','appointment_id', 'id'); 
     }
}
