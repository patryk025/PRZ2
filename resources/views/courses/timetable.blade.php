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
                <div class="flex space-x-4 justify-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="prevMonthButton" wire:click="prevMonth">Poprzedni miesiąc</button>
                    <span class="text-gray-700 font-bold" id="currentMonthAndYear"></span>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="nextMonthButton" wire:click="nextMonth">Następny miesiąc</button>
                </div>
                @livewire('courses.course-timetable', ['extras' => $extras])
            </div>
        </div>
    </div>
    @component('timetables.modal_course', ['course' => $course])
    @endcomponent
    <script>
    var modal = document.getElementById("modalCourse");

    var course_id = "{{ $course->id }}";

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var newLesson = true;

    window.addEventListener('openModal', event => {
        openModal();

        document.getElementById("modal-headline").innerText = "Dodaj zajęcia";

        document.getElementById("id_lekcji").value = "";

        var year = event.detail.year;
        var month = event.detail.month;
        var day = event.detail.day;

        newLesson = true;

        document.getElementById("data_rozpoczecia").value = year + "-" + (month < 10 ? "0" + month : month) + "-" + (day < 10 ? "0" + day : day);
    });

    window.addEventListener('openEditModal', event => {
        openModal();

        document.getElementById("modal-headline").innerText = "Edytuj zajęcia";

        document.getElementById("id_lekcji").value = event.detail.id_lekcji;

        var date = event.detail.data;
        var godz_start = event.detail.godz_rozpoczecia;
        var godz_end = event.detail.godz_zakonczenia;

        newLesson = false;

        document.getElementById("nazwa_zajec").value = event.detail.nazwa_zajec;
        document.getElementById("opis_zajec").value = event.detail.opis_zajec;
        document.getElementById("data_rozpoczecia").value = date;
        document.getElementById("godz_rozpoczecia").value = godz_start;
        document.getElementById("godz_zakonczenia").value = godz_end;
    });

    document.getElementById("lessonForm").addEventListener('submit', event => {
        event.preventDefault();

        var data = new FormData(document.getElementById("lessonForm"));

        if(newLesson) {
            fetch(`/courses/${course_id}/timetable`, {
                method: 'POST',
                body: data
            }).then(response => {
                if (response.ok) {
                    window.livewire.emit('refreshCalendar');

                    window.$wireui.notify({
                        title: 'Zapisano',
                        description: 'Zajęcia zostały zapisane',
                        icon: 'success'
                    });

                    closeModal();
                }
                else {
                    window.$wireui.notify({
                        title: 'Wystąpił błąd',
                        description: response.message,
                        icon: 'error'
                    })
                }
            }).catch(error => {
                window.$wireui.notify({
                    title: 'Wystąpił błąd',
                    description: response.statusText,
                    icon: 'error'
                })
            });
        }
        else {
            fetch(`/courses/${course_id}/timetable/${event.target.id_lekcji.value}`, {
                method: 'POST',
                body: data
            }).then(response => {
                if (response.ok) {
                    window.livewire.emit('refreshCalendar');

                    window.$wireui.notify({
                        title: 'Zapisano',
                        description: 'Zajęcia zostały zapisane',
                        icon: 'success'
                    });

                    closeModal();
                }
                else {
                    window.$wireui.notify({
                        title: 'Wystąpił błąd',
                        description: response.message,
                        icon: 'error'
                    })
                }
            }).catch(error => {
                window.$wireui.notify({
                    title: 'Wystąpił błąd',
                    description: response.statusText,
                    icon: 'error'
                })
            })
        }
    });
    </script>
</x-app-layout>


