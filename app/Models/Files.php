<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $table = 'files'; 
    protected $primaryKey = 'id'; 

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
