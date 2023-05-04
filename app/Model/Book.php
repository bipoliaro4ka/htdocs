<?php
namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'author_id', 'date_publish', 'price', 'annotation', 'genre_id', 'hall_id', 'publisher_id', 'rent', 'cover', 'status'];
}