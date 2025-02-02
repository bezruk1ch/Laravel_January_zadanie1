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

    // Удобный доступ к статусам
    const STATUS_NEW = 'new';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public function getStatusLabelAttribute()
{
    switch ($this->status) {
        case 'new':
            return 'Новая заявка';
        case 'completed':
            return 'Услуга оказана';
        case 'cancelled':
            return 'Услуга отменена';
        default:
            return 'Неизвестный статус';
    }
}
}
