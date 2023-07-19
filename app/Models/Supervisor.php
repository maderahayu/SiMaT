<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'tblSupervisor';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemagang()
    {
        return $this->hasMany(pemagang::class, 'supervisorId');
    }

    protected $fillable = [
        'namaSupervisor',
        'fotoProfil',
        'noTelp'
    ];
 
    protected $hidden = [
        'timestamps',
    ];
 
    // protected $casts = [
    //     'tglMulai' => 'datetime',
    //     'tglSelesai' => 'datetime',
    // ];

}
