<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterCategory extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['letter_category_name'];
    
    public function setLetterCategoryNameAttribute($value)
    {
        $this->attributes['letter_category_name'] = ucwords($value);
    }
}
