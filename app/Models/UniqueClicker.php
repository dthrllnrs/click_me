<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniqueClicker extends Model
{
    /**
     * Table name for model.
     * @var string
     */
    protected $table = 'unique_clickers';

    /**
     * Mass assignable fields for model
     *
     * @var Array
     */
    protected $fillable = [
        'day',
        'ip_address'
    ];

    public function day() {
        return $this->belongsTo(DailyClick::class, 'day', 'day');
    }
}
