<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //declare table
     public $table = 'appointment'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'doctor_id',
         'user_id',
         'consultation_id',
         'level',
         'date',
         'time',
         'status',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     //one to many
    public function doctor(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\Operational\Doctor','doctor_id', 'id'); 
     }

     //one to one
     public function transaction(){ //nama function adalah tabel yg ingin dituju
        return $this->hasOne('app\Models\Operational\Transaction','appointment_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }

     public function consultation(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\MasterData\Consultation','consultation_id', 'id'); 
     }

     public function user(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\User','user_id', 'id'); 
     }
}
