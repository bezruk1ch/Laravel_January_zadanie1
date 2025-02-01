@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Панель администратора</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ФИО заявителя</th>
                <th>Контактные данные</th>
                <th>Услуга</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Тип оплаты</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->full_name }}</td>
                <td>{{ $report->contact }}</td>
                <td>{{ $report->service->title }}</td>
                <td>{{ $report->date }}</td>
                <td>{{ \Carbon\Carbon::parse($report->time)->format('H:i') }}</td>
                <td>{{ $report->payment === 'cash' ? 'Наличные' : 'Карта' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection