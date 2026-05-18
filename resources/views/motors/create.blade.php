<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter un nouveau Moteur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('moteurs.store') }}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nom du produit</label>
                        <input type="text" name="name" class="shadow appearance-none border border-gray-300 dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Référence unique</label>
                        <input type="text" name="reference" class="shadow appearance-none border border-gray-300 dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-900" required>
                    </div>

                    <div class="flex gap-4 mb-6">
                        <div class="w-1/2">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Prix (€)</label>
                            <input type="number" step="0.01" name="price" class="shadow appearance-none border border-gray-300 dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-900" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Stock initial</label>
                            <input type="number" name="stock" class="shadow appearance-none border border-gray-300 dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-900" required value="0">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" style="background-color: #3b82f6;" class="text-white font-bold py-2 px-4 rounded hover:bg-blue-700 hover:opacity-90">
                            Sauvegarder le moteur
                        </button>
                        <a href="{{ route('moteurs.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>