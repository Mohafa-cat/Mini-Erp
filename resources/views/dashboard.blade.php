<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Statistique
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider mb-1">
                        Modèles au catalogue
                    </div>
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $totalMotors }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider mb-1">
                        Valeur totale du stock
                    </div>
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ number_format($totalValue, 2, ',', ' ') }} €
                    </div>
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                        Ruptures de stock
                    </h3>
                </div>
                
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 text-sm border-b border-gray-200 dark:border-gray-700">
                                <th class="p-4 font-medium">Référence</th>
                                <th class="p-4 font-medium">Nom du Produit</th>
                                <th class="p-4 font-medium text-center">Quantité Restante</th>
                                <th class="p-4 font-medium text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lowStockMotors as $moteur)
                                <tr class="border-b border-gray-100 dark:border-gray-700 text-gray-800 dark:text-gray-200">
                                    <td class="p-4 text-sm">{{ $moteur->reference }}</td>
                                    <td class="p-4">{{ $moteur->name }}</td>
                                    <td class="p-4 text-center font-bold text-red-500">
                                        {{ $moteur->stock }}
                                    </td>
                                    <td class="p-4 text-right">
                                        <a href="{{ route('moteurs.edit', $moteur->id) }}" class="text-blue-500 hover:underline text-sm">
                                            Réapprovisionner
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-6 text-center text-gray-500 dark:text-gray-400">
                                        Aucune rupture de stock actuelle.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>