<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Record
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            //Ajax Datatable

            var datatable = $('#crudTable').DataTable({

            });
        </script>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Record Detail</h2>
            <br>
            <br>
            <hr>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <label for="">Kandungan Gizi</label>
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Protein</th>
                                <td class="border px-6 py-4 ">{{ $mixing->protein }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Lemak</th>
                                <td class="border px-6 py-4 ">{{ $mixing->lemak }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">S.Kasar</th>
                                <td class="border px-6 py-4 ">{{ $mixing->kasar }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">M.Energi</th>
                                <td class="border px-6 py-4 ">{{ $mixing->energi }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Ca</th>
                                <td class="border px-6 py-4 ">{{ $mixing->ca }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">P</th>
                                <td class="border px-6 py-4 ">{{ $mixing->p }}%</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <label for="">Total Harga/Pakan</label>
                        <tbody>
                            @foreach ($total_per_pakan as $item)
                                <tr>
                                    <th class="border px-6 py-4 text-right">{{ $item->pakan->name }}</th>
                                    <td class="border px-6 py-4 ">Rp{{ number_format($item->total_harga) }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <label for="">Total Harga (Semua Pakan) </label>
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Total Harga(Rp)</th>
                                <td class="border px-6 py-4 ">Rp{{ number_format($total_semua_pakan->total_harga) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>


            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <label for="">Detail Pakan</label>
                        <tbody>

                            @foreach ($total_per_pakan as $item)
                                <tr>
                                    <th class="border px-6 py-4 text-center">{{ $item->pakan->name }}</th>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>



            <div class="col-lg-6"><a href="#" class="bg-green-500 text-white rounded-md px-6 py-1 m-2">
                    Edit </a>



            </div>





        </div>
    </div>
</x-app-layout>
