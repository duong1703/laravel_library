<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = "comment";

    protected $primaryKey = "id";

    protected $fillable = ['member_id', 'book_id', 'comment', 'answer_comment'];

    public function book()
    {
        return $this->belongsTo(book::class);
    }

    public function member()
    {
        return $this->belongsTo(member::class, 'member_id');
    }
}
