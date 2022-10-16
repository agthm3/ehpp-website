<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pakan
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            //Ajax Datatable

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%'
                    },
                    {
                        data: 'product.name',
                        name: 'product.name'
                    },
                    {
                        data: 'product.price',
                        name: 'product.price'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Pakan Detail</h2>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Name</th>
                                <td class="border px-6 py-4 ">{{ $pakan->name }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Harga</th>
                                <td class="border px-6 py-4 ">Rp{{ number_format($pakan->price) }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Protein</th>
                                <td class="border px-6 py-4 ">{{ $pakan->protein }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Lemak</th>
                                <td class="border px-6 py-4 ">{{ $pakan->lemak }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Serat</th>
                                <td class="border px-6 py-4 ">{{ $pakan->serat }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Energi</th>
                                <td class="border px-6 py-4 ">{{ $pakan->energi }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Ca</th>
                                <td class="border px-6 py-4 ">{{ $pakan->ca }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">P</th>
                                <td class="border px-6 py-4 ">{{ $pakan->p }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Mixing</th>
                                <td class="border px-6 py-4 ">{{ $pakan->mixing }}Kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">pakan Item</h2>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
