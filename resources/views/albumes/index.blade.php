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
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($albumes as $album)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4">
                                                <div class="text-m text-gray-900">
                                                    {{-- Pendiente de incluir --}}
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
