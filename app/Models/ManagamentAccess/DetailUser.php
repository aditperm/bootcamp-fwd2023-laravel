<?php

namespace App\Models\ManagamentAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare table
    public $table = 'detail_user'; //menginisiasi bahwa model detailuser table nya adalah detail user

    //this field type date
    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
        //meprotec agar record ini tidak muncul
    ];

    //declare fillable
    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
