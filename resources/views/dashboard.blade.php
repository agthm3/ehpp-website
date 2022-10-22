<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        td {
            text-align: center;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-slot name="script">
                    <script>
                        //Ajax Datatable

                        var datatable = $('#crudTable').DataTable();
                    </script>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <table id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor </th>
                                            <th>Jenis Record</th>
                                            <th>Record ID</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($record as $item)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $no }}
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->code }}
                                                </td>
                                                <td style="display: flex; justify-content:center">
                                                    <a href="'.route('dashboard.transaction.show', $item->code) . '"
                                                        class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2">
                                                        Cetak
                                                    </a>
                                                    <a href="{{ url('/dashboard/show/' . $item->code) }}"
                                                        class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2">
                                                        Show
                                                    </a>
                                                    <a href="'.route('dashboard.transaction.show', $item->code) . '"
                                                        class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2">
                                                        Edit
                                                    </a>
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
    </div>
</x-app-layout>
