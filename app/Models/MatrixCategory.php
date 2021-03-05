<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'description'
    ];

    public function matrixfunction()
{
    return $this->hasMany(MatrixFunction::class);
}

}
