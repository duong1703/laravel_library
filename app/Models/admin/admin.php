<?php

namespace App\Models\admin;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Fortify\TwoFactorAuthenticatable;


class admin extends Authenticatable implements CanResetPassword
{
    // use HasFactory;
    use Notifiable, \Illuminate\Auth\Passwords\CanResetPassword, TwoFactorAuthenticatable;


    protected $table = "admin";

    protected $primaryKey = "id";

    protected $Fillable = ['name', 'email', 'password', 'role', 'remember_token', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at'];


    public function getIsSuperAdminAttribute()
    {
        return $this->is_super_admin;
    }

    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function member()
    {
        return $this->hasMany(member::class, 'admin_id');
    }

    public function book()
    {
        return $this->hasMany(book::class, 'admin_id');
    }


    
}