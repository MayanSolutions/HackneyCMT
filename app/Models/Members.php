<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $dates = ['agm_date', 'position_exp_date','deletion_date'];

    protected $fillable = [
        'agm_date',
        'elected_name',
        'elected_email',
        'position',
        'elected_contact',
        'position_exp_date',
        'deletion_date'
    ];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Members';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'agm_date',
        'client_id',
        'elected_name',
        'position',
        'elected_email',
        'elected_contact',
        'position_exp_date',
        'deletion_date',
    ];

    public function client(){

        return $this->belongsTo(clients::class, 'id', 'client_id');

    }
}
