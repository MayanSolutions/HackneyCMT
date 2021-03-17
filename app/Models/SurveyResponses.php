<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SurveyResponses extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Digital Review Questions';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'survey_id',
        'question_id',
        'answer_id',
        'liaison_officer',
        'assessment_result',
        'comments',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
