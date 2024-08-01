<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $table = "message";

    protected $primaryKey = "id";

    protected $fillable = ['fullname', 'email', 'ID_student', 'message', 'status', 'reply'];
}
