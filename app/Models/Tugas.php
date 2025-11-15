<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //
    protected $fillable = [
        'users_id',
        'tugas',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
