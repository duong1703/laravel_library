<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $table = "message";

    protected $primaryKey = "id";

    protected $fillable = [ 'member_id', 'fullname', 'email', 'ID_student', 'message', 'status', 'reply'];

    public function member(){
        return $this->hasMany(Member::class, 'member_id');
    }
}
