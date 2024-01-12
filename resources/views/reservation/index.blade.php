<x-app-layout>
    <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Rezerwacje
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="mb-4">
                <x-button primary label="Dodaj zgłoszenie" href="{{ route('reservations.create') }}"> </x-button>
            </div>
            
            <div class="bg-white shadow-x1 sm:rounded-lg" id="table-view-wrapper">  
                <livewire:reservations.reservations-table-view/>                
            </div>
            
        </div>
    </div>
</x-app-layout>
