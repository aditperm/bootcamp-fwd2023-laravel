<?php

namespace App\Models\ManagamentAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;

    use SoftDeletes;

     //declare table
     public $table = 'role'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'title',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     //one to many
    public function permission_role(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\ManagamentAccess\PermissionRole','role_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }

     //one to many
    public function role_user(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\ManagamentAccess\RoleUser','role_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }
}
