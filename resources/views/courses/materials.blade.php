<x-app-layout>

@php
    $materials = $course->materials;
@endphp

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-semibold mb-4 text-center">Materiały dla kursu {{ $course->name }}</h1>

    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher'))
        <div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-md">
            <form action="{{ route('courses.materials.create', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nazwa wyświetlana:</label>
                    <input type="text" name="name" id="name" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" required>
                </div>
                <div class="mb-4">
                    <label for="material" class="block text-gray-700 text-sm font-bold mb-2">Materiał:</label>
                    <input type="file" name="material" id="material" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Prześlij</button>
            </form>
        </div>

        <div class="mt-8">
            @if ($materials->isEmpty())
                <p class="text-center">Brak materiałów dla tego kursu.</p>
            @else
                <div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-md">
                    <ul class="list-disc list-inside">
                        @foreach ($materials as $material)
                            <li class="mb-2">{{ $material->name }} - <a href="{{ $material->path }}" class="text-blue-600 hover:text-blue-800">Pobierz</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @else
        <p class="text-red-500 text-center">Dostęp ograniczony. Tylko administratorzy i nauczyciele mogą przesyłać materiały.</p>
    @endif
</div>

</x-app-layout>
