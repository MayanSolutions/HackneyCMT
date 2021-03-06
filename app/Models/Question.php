<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Question extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    protected static $recordEvents = ['created', 'deleted'];

    protected static $logName = 'Digital Review Questions';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'question',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
