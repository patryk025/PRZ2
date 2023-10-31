<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="text-align:center; height: 250px; padding-top:20px">
                <h2 style="font-size: 15pt">Witaj {{ Auth::user()->name }}</h2>
                <h3>Przejdź do odpowiedniej opcji używając menu</h3>
            </div>
        </div>
    </div>
</x-app-layout>
