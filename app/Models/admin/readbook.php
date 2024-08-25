<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class readbook extends Model
{
    use HasFactory;

    protected $table = "readbook";

    protected $primaryKey = "id";

    protected $fillable = ['member_id', 'book_id', 'read_count', 'last_read_at'];

    public function member()
    {
        return $this->belongsTo(member::class, 'member_id');
    }

    public function book()
    {
        return $this->belongsTo(book::class, 'book_id');
    }
}
