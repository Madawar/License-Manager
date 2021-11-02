<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class License extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'password',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->setReminders($model);
        });
        self::updating(function ($model) {
            $model->setReminders($model);
        });
        self::retrieved(function ($model) {
            $reminder = explode(" ", $model->reminder);
            $renewal = explode(" ", $model->renewal);
            $model->reminder = $reminder[0];
            $model->license_reminder_period = $reminder[1];
            $model->renewal = $renewal[0];
            $model->license_period = $reminder[1];
        });
        self::updated(function ($model) {
            $reminder = explode(" ", $model->reminder);
            $renewal = explode(" ", $model->renewal);
            $model->reminder = $reminder[0];
            $model->license_reminder_period = $reminder[1];
            $model->renewal = $renewal[0];
            $model->license_period = $reminder[1];
        });
    }

    public function setReminders($model)
    {
        $last_acquired = Carbon::parse($model->last_acquired);
        $expiry = $last_acquired->copy()->add($model->renewal, $model->license_period);
        $reminder = $last_acquired->copy()->sub($model->reminder, $model->license_reminder_period);
        $model->next_renewal = $expiry;
        $model->renewal = $model->renewal . ' ' . $model->license_period;
        $model->next_reminder = $reminder;
        $model->reminder = $model->reminder . ' ' . $model->license_reminder_period;
        $model->offsetUnset('license_period');
        $model->offsetUnset('license_reminder_period');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function log()
    {
        return $this->hasOne(EmailLog::class, 'license_id', 'id');
    }
    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


*/
}
