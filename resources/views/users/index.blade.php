<x-app-layout>
    <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{__('translation.navigation.users')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <div class="overflow-auto bg-white shadow-x1 sm:rounded-lg id="table-view-wrapper">  
                <livewire:users.users-table-view/>
                <x-button primary label="Dodaj użytkownika" href="{{ route('users.create') }}"> </x-button>
                
            </div>
            
        </div>
    </div>
</x-app-layout>


