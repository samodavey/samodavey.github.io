<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use Sortable;
    public $sortable = ['title','author'];
    protected $fillable = ['title', 'author'];
}
