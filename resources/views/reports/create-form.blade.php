<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание новой заявки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="address">Адрес:</label>
                            <input type="text" name="address" id="address" required class="border p-2 w-full">
                        </div>

                        <div class="mt-4">
                            <label for="contact">Контактные данные:</label>
                            <input type="text" name="contact" id="contact" required class="border p-2 w-full">
                        </div>

                        <div class="mt-4">
                            <label for="service_id">Тип услуги:</label>
                            <select name="service_id" id="service_id" required class="border p-2 w-full">
                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Разделение даты и времени -->
                        <div class="mt-4">
                            <label for="date">Дата:</label>
                            <input type="date" name="date" id="date" required class="border p-2 w-full">
                        </div>

                        <div class="mt-4">
                            <label for="time">Время:</label>
                            <input type="time" name="time" id="time" required class="border p-2 w-full">
                        </div>

                        <div class="mt-4">
                            <label for="payment">Тип оплаты:</label>
                            <select name="payment" id="payment" required class="border p-2 w-full">
                                <option value="cash">Наличные</option>
                                <option value="card">Карта</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" style="background-color: green; color: white; padding: 8px 16px; border-radius: 4px;">
                                Создать заявку
                            </button>
                            <button type="submit" style="background-color: #800020; color: white; padding: 8px 16px; border-radius: 4px;">
                                <a href="{{ route('reports.reports-history') }}">
                                    Вернуться к истории заявок
                                </a>
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                    <p class="text-green-500 mt-4">{{ session('success') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>