<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //declare table
     public $table = 'doctor'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'specialist_id',
         'name',
         'fee',
         'photo',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     //one to many
    public function specialist(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\MasterData\Specialist','specialist_id', 'id'); 
     }

     //one to many
     public function appointment(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\Operational\Appointment','doctor_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }
}
