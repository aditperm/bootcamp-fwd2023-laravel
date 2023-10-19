<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //declare table
     public $table = 'type_user'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'name',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     //one to many
     public function details_user(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\ManagamentAccess\DetailUser','type_user_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }
}
