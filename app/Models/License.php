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
            $last_acquired = Carbon::parse($model->last_acquired);
            $expiry = $last_acquired->copy()->add($model->renewal, $model->license_period);
            $reminder = $last_acquired->copy()->sub($model->reminder, $model->license_reminder_period);
            $model->next_renewal = $expiry;
            $model->renewal = $model->renewal . ' ' . $model->license_period;
            $model->next_reminder = $reminder;
            $model->reminder = $model->reminder . ' ' . $model->license_reminder_period;
            $model->offsetUnset('license_period');
            $model->offsetUnset('license_reminder_period');
        });
    }
    /*
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

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
