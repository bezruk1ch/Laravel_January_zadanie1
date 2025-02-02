<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель администратора') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-lg font-semibold">Список заявок</h3>
                @foreach($reports as $report)
                <div class="border-b py-4">
                    <p><strong>Адрес:</strong> {{ $report->address }}</p>
                    <p><strong>Услуга:</strong> {{ $report->service->title }}</p>
                    <p><strong>Статус:</strong> {{ $report->status_label }}</p>

                    @if($report->status === 'new')
                    <form action="{{ route('reports.confirm', $report->id) }}" method="POST" class="inline" id="confirm-form-{{ $report->id }}">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded" id="confirm-button-{{ $report->id }}">Подтвердить</button>
                    </form>

                    <form action="{{ route('reports.cancel', $report->id) }}" method="POST" class="inline ml-2">
                        @csrf
                        <input type="text" name="rejection_reason" placeholder="Причина отклонения" required class="border px-2 py-1 rounded">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Отклонить</button>
                    </form>
                    @elseif($report->status === 'cancelled')
                    <p class="text-red-500"><strong>Причина отклонения:</strong> {{ $report->rejection_reason }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
