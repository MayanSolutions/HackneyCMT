<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixFunction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];


    public function matrixcategory()
{
    return $this->belongsTo(MatrixCategory::class);
}

public function clients()
{
    return $this->belongsToMany(clients::class, 'clients_matrix_function','function_id', 'client_id');
}

}

