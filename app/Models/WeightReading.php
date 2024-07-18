<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightReading extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->readingId = 'T'.date('Ymd').str_pad(WeightReading::max('id') + 1, 3, 0, STR_PAD_LEFT);
        });
    }
    public function second()
    {
        return $this->hasOne(WeightReadingSecond::class, 'readingId', 'readingId');
    }
}
