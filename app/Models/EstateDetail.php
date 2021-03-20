<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EstateDetail extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'client_id',
        'no_of_units',
        'leaseholders',
        'freeholders',
        'tenants',
        'comm_halls',
        'outside_areas',
        'communal_facilities',
    ];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Estates';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'client_id',
        'no_of_units',
        'leaseholders',
        'freeholders',
        'tenants',
        'comm_halls',
        'outside_areas',
        'communal_facilities',
    ];


    public function clients()
    {
        return $this->hasMany(Survey::class, 'id', 'client_id');
    }
}
