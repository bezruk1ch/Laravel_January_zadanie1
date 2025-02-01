<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('История заявок') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Кнопка для перехода на страницу формирования заявки -->
                    <button type="submit" style="background-color: green; color: white; padding: 8px 16px; border-radius: 4px;">
                        <a href="{{ route('reports.create-form') }}">
                            Создать новую заявку
                        </a>
                    </button>

                    <h3 class="mt-6 text-lg font-semibold">Предыдущие заявки</h3>
                    @if($reports->isEmpty())
                    <p>У вас нет предыдущих заявок.</p>
                    @else
                    <ul class="mt-4">
                        @foreach($reports as $report)
                        <li class="border-b py-2">
                            <p><strong>Адрес:</strong> {{ $report->address }}</p>
                            <p><strong>Тип услуги:</strong> {{ $report->service->title }}</p>
                            <p><strong>Дата:</strong> {{ $report->date }}</p>
                            <p><strong>Время:</strong> {{ \Carbon\Carbon::parse($report->time)->format('H:i') }}</p>
                            <p><strong>Тип оплаты:</strong> {{ $report->payment === 'cash' ? 'Наличные' : 'Карта' }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>