<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class MatrixCategory extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'category',
        'description'
    ];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Housing Categories';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'category',
        'description',
    ];

    public function matrixfunction()
{
    return $this->hasMany(MatrixFunction::class);
}

}
