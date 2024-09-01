<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = "book";

    protected $primaryKey = "id";

    protected $fillable = ['book_images', 'book_name', 'book_author', 'book_file' ,  'book_publisher', 'book_year_of_manufacture', 'book_amount', 'book_category', 'book_status'];

    public function readbooks()
    {
        return $this->hasMany(readbook::class);
    }
}
