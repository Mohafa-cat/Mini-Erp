<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Catalogue des Moteurs
            </h2>
            
            <a href="{{ route('moteurs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow">
                Ajouter un Moteur
            </a>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border-b py-4 px-4">Nom du Produit</th>
                            <th class="border-b py-4 px-4">Référence</th>
                            <th class="border-b py-4 px-4">Prix</th>
                            <th class="border-b py-4 px-4 text-center">Stock</th>
                            <th class="border-b py-4 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motors as $motor)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b py-2 px-4">{{ $motor->name }}</td>
                            <td class="border-b py-2 px-4 text-gray-500">{{ $motor->reference }}</td>
                            <td class="border-b py-2 px-4 font-bold">{{ $motor->price }} €</td>
                            <td class="border-b py-2 px-4 text-center">
                                <span class="text-green-600">{{ $motor->stock }}</span>
                            </td>
                            <td class="border-b py-2 px-4 text-center">
                                <a href="{{ route('moteurs.edit', $motor->id) }}" class="text-yellow-600 dark:text-yellow-500 hover:text-yellow-800 font-bold mr-4">
                                    Éditer
                                </a>

                                <form action="{{ route('moteurs.destroy', $motor->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-800 font-bold">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>