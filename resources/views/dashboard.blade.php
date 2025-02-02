<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Привет пользователь!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Добро пожаловать на портал клининговых услуг «Мой Не Сам»!</h1>

                    <p class="mb-4">Рады снова видеть вас!</p>

                    <p class="mb-4">С помощью нашего портала вы можете быстро и удобно:</p>
                    <ul class="list-disc list-inside mb-4">
                        <li><strong>Создавать новые заявки</strong> на уборку жилых и производственных помещений</li>
                        <li><strong>Отслеживать статус</strong> ваших текущих и предыдущих заявок</li>
                        <li><strong>Управлять своими данными</strong> в личном кабинете</li>
                    </ul>

                    <h3 class="text-lg font-semibold mb-2">Напоминаем, что при оформлении заявки вы можете:</h3>
                    <ul class="list-disc list-inside mb-4">
                        <li>Указать удобные дату и время для оказания услуги</li>
                        <li>Выбрать подходящий тип оплаты: <strong>наличными</strong> или <strong>банковской картой</strong></li>
                        <li>Указать важные детали для более качественного оказания услуги</li>
                    </ul>

                    <p class="mb-4">Ваши заявки обрабатываются нашими администраторами, которые:</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Подтверждают заявки</li>
                        <li>Отмечают их как выполненные</li>
                        <li>При необходимости сообщают причину отклонения заявки</li>
                    </ul>

                    <p class="font-semibold text-green-600">Спасибо, что выбираете «Мой Не Сам» — мы сделаем ваш дом чище и уютнее!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>