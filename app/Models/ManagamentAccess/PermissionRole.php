<?php

namespace App\Models\ManagamentAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;

    use SoftDeletes;

     //declare table
     public $table = 'permission_role'; //menginisiasi bahwa model detailuser table nya adalah detail user

     //this field type date
     protected $date = [
         'created_at',
         'updated_at',
         'deleted_at',
         //meprotec agar record ini tidak muncul
     ];
 
     //declare fillable
     protected $fillable = [
         'permission_id',
         'role_id',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

      //one to many
    public function permission(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\ManagamentAccess\Permission','permission_id', 'id'); 
     }

       //one to many
    public function role(){ //nama function adalah tabel yg ingin dituju
        //3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('app\Models\ManagamentAccess\Role','role_id', 'id'); 
     }
}
