<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class); // Обратная связь
    }

    public function service()
    {
        return $this->belongsTo(Service::class); // Один отчет относится к одному сервису
    }
}
