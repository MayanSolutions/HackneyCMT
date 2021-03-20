<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Survey extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Roles and Permissions';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'review_id',
        'client_id',
        'officer',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponses::class);
    }

    public function clients()
    {
        return $this->belongsTo(clients::class, 'client_id', 'id');
    }
}
