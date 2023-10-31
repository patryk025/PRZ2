<x-app-layout>
    <script>
        var data = new Date();
        var month = data.getMonth() + 1;
        var year = data.getYear() + 1900;

        const monthNames = [
            'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec',
            'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień',
        ];

        document.addEventListener('DOMContentLoaded', () => {
            updateDate(0);
            document.getElementById('prevMonthButton').addEventListener('click', () => {
                window.livewire.emit('prevMonth');
                updateDate(-1);
            });
            document.getElementById('nextMonthButton').addEventListener('click', () => {
                window.livewire.emit('nextMonth');
                updateDate(1);
            });
        });

        function updateDate(offset) {
            month += offset;
            if(month == 0) {
                month = 12;
                year--;
            }
            else if(month == 13) {
                month = 1;
                year++;
            }
            document.getElementById("currentMonthAndYear").innerText = monthNames[month-1] + " " + year;
        }
    </script>
    <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{__('Kalendarz')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-auto bg-white shadow-x1 sm:rounded-lg" id="table-view-wrapper">  
                <!--livewire:courses.course-timetable /-->
                @php
                    $extras = ['course' => $course];
                @endphp
                <div class="flex space-x-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="prevMonthButton" wire:click="prevMonth">Poprzedni miesiąc</button>
                    <span class="text-gray-700 font-bold" id="currentMonthAndYear"></span>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="nextMonthButton" wire:click="nextMonth">Następny miesiąc</button>
                </div>
                @livewire('courses.course-timetable', ['extras' => $extras])
            </div>
        </div>
    </div>
</x-app-layout>


