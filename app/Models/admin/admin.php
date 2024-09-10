<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
    // use HasFactory;
    use Notifiable;

    protected $table = "admin";

    protected $primaryKey = "id";

    protected $Fillable = ['name', 'email', 'password', 'role'];

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
}
