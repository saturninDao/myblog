<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtile', 'content','slug'];

    public function format_date(){
        return date_format($this->created_at, 'd-m-y h:i');
    }

}
