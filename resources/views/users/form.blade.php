<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uczestnicy') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('users.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Imię i nazwisko:</label>
                        <input type="text" name="name" id="name" class="border rounded-lg py-2 px-3 w-full" placeholder="Podaj imię i nazwisko">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Adres e-mail:</label>
                        <input type="email" name="email" id="email" class="border rounded-lg py-2 px-3 w-full" placeholder="Podaj adres e-mail">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Hasło:</label>
                        <input type="password" name="password" id="password" class="border rounded-lg py-2 px-3 w-full" placeholder="Podaj hasło">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Dodaj użytkownika</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

