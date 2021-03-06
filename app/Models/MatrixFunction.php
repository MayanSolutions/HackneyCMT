<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class MatrixFunction extends Model
{
    use HasFactory;
    use LogsActivity;

    public $timestamps = false;

    protected $guarded = [];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Housing Functions';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'function',
    ];


    public function matrixcategory()
{
    return $this->belongsTo(MatrixCategory::class);
}

public function clients()
{
    return $this->belongsToMany(clients::class, 'clients_matrix_function','function_id', 'client_id');
}

}

