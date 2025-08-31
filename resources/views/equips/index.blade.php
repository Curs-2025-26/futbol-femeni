@extends('layouts.app')
@section('title', "Guia d'Equips")

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia d'Equips</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <p class="mb-4">
        <a href="{{ route('equips.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">➕ Nou equip</a>
    </p>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 p-2">Nom</th>
            <th class="border border-gray-300 p-2">Estadi</th>
            <th class="border border-gray-300 p-2">Títols</th>
            <th class="border border-gray-300 p-2">Accions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equips as $equip)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 p-2">
                    <a href="{{ route('equips.show', $equip->id) }}" class="text-blue-700 hover:underline">{{ $equip->nom }}</a>
                </td>
                <td class="border border-gray-300 p-2">{{ $equip->estadi->nom }}</td>
                <td class="border border-gray-300 p-2">{{ $equip->titols }}</td>
                <td class="border border-gray-300 p-2 flex space-x-2">
                    <a href="{{ route('equips.edit', $equip->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 flex items-center space-x-1">
                        <span>✏️</span>
                    </a>

                    <form action="{{ route('equips.destroy', $equip->id) }}" method="POST"
                          onsubmit="return confirm('Segur que vols eliminar aquest equip?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 flex items-center space-x-1">
                            <span>🗑️</span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


