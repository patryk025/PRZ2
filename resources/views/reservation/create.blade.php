<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <h2 class="text-xl font-bold mb-4">Formularz Rezerwacji Sali</h2>

        @if(session('message'))
            <p class="text-green-500">{{ session('message') }}</p>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST" class="bg-white p-4 rounded-lg shadow">
            @csrf
            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Data:</label>
                <input type="date" name="date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Godzina:</label>
                <input type="time" name="time" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="hall_id" class="block text-gray-700 text-sm font-bold mb-2">Sala:</label>
                <select name="hall_id" required class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Opis:</label>
                <input type="text" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Zarezerwuj</button>
        </form>
    </div>
</x-app-layout>
