
<div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Imię</th>
                    <th class="py-2 px-4 border-b">Nazwisko</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Telefon</th>
                    <th class="py-2 px-4 border-b">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $teacher->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $teacher->surname }}</td>
                        <td class="py-2 px-4 border-b">{{ $teacher->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $teacher->phone }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('teachers.edit', $teacher) }}" class="text-blue-500 hover:underline">Edytuj</a>
                            <form action="{{ route('teachers.destroy', $teacher) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500 hover:underline">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 px-4 border-b" colspan="5">Brak nauczycieli do wyświetlenia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
