<?php

namespace Modules\Color\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
      'color_code', 'color_name', 'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Color\Database\factories\ColorFactory::new();
    }
}
