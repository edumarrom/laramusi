<x-albumes>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <div class="border border-gray-200 shadow">
                            <table>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-2 text-xl text-gray-500">
                                            Portada
                                        </th>
                                        <th class="px-6 py-2 text-xl text-gray-500">
                                            Título
                                        </th>
                                        <th class="px-6 py-2 text-xl text-gray-500">
                                            Autor
                                        </th>
                                        <th class="px-6 py-2 text-xl text-gray-500">
                                            Descargar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($albumes as $album)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4">
                                                <div class="text-m text-gray-900">
                                                    <img src="{{ asset('storage/portadas/' . $album->id . '.jpg') }}"/>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-m text-gray-900">
                                                    {{ $album->titulo }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-m text-gray-900">
                                                    {{ $album->autor }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-m text-gray-900">
                                                    <a href="{{ route('albumes-descargar', [$album]) }}" type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800
                                                            focus:ring-4 focus:ring-blue-300 font-medium rounded-lg
                                                            text-xs px-2 py-1 text-center">Descargar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-albumes>
