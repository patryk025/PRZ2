<x-app-layout>
    <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Płatności
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <div class="bg-white shadow-x1 sm:rounded-lg" id="table-view-wrapper">  
                <livewire:payments.payments-table-view/>                
            </div>
            
        </div>
    </div>
</x-app-layout>

