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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '40%'
                },
            ],
        });
    </script>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jenis Record</th>
                            <th>Record ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                adfa
                            </td>
                            <td>
                                fda
                            </td>
                            <td>
                                dfa
                            </td>
                            <td style="display: flex">
                                <a href="'.route('dashboard.transaction.show', $item->id) . '"
                                    class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Cetak </a>
                                <a href="'.route('dashboard.transaction.show', $item->id) . '"
                                    class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Show </a>
                                <a href="'.route('dashboard.transaction.show', $item->id) . '"
                                    class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Edit </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
