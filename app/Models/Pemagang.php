<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemagang extends Model
{
    use HasFactory;

    // use HasApiTokens, HasFactory, Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'tblPemagang';

    protected $fillable = [
        'userId',
        'namaPemagang',
        'namaUniversitas',
        'email',
        'fotoProfil',
        'tglMulai',
        'tglSelesai',
        'noTelp',
        'type'
    ];
 
    protected $hidden = [
        'noTelp',
        'timestamps',
    ];
 
    protected $casts = [
        'tglMulai' => 'datetime',
        'tglSelesai' => 'datetime',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(Pemagang::class, 'pemagangId');
    // }

    public function userHas()
    {
        return $this->hasMany(Pemagang::class, 'userId');
    }

    
}
