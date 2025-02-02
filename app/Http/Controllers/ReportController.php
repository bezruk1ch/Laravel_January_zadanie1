<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\Service;

class ReportController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('reports.create-form', compact('services'));
    }

    public function history()
    {
        $userId = auth()->id(); // Получаем ID текущего пользователя
        $reports = Report::where('user_id', $userId)->with('service')->get(); // Фильтруем заявки по user_id

        return view('reports.reports-history', compact('reports'));
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'address' => 'required|string|max:255',
            'service_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'payment' => 'required|string|max:50',
            'contact' => 'required|string|max:255',
        ]);

        // Создание записи в базе
        Report::create([
            'address' => $request->address,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'time' => $request->time,
            'payment' => $request->payment,
            'contact' => $request->contact,
            'user_id' => auth()->user()->id,
            'status' => Report::STATUS_NEW, // Установка статуса при создании
            'rejection_reason' => null, // По умолчанию заявка не отклонена
        ]);



        // Редирект обратно с сообщением
        return redirect()->route('reports.reports-history')->with('success', 'Заявка успешно создана!');
    }
}
