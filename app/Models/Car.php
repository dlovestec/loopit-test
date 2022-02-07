<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    public const MAKE_COLUMN = 'make';
    public const MODEL_COLUMN = 'model';
    public const YEAR_COLUMN = 'year';
    public const PRICE_COLUMN = 'price';
    public const COLOR_COLUMN = 'color';

    protected $fillable = [
        self::MAKE_COLUMN,
        self::MODEL_COLUMN,
        self::YEAR_COLUMN,
        self::PRICE_COLUMN,
        self::COLOR_COLUMN
    ];
}
