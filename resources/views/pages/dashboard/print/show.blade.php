@extends('layouts.print')

@section('content')
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Record Detail >>
                <?php
                // Set the new timezone
                date_default_timezone_set('Asia/Makassar');
                $date = date('d-m-y h:i:s');
                echo $date;
                ?>
            </h2>


            <hr>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <label for="">Kandungan Gizi</label>
                        <tbody>
                            <tr>
                                <th class="border px-4 py-2 text-right">Protein</th>
                                <td class="border px-4 py-2 ">{{ $mixing->protein }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-right">Lemak</th>
                                <td class="border px-4 py-2 ">{{ $mixing->lemak }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-right">S.Kasar</th>
                                <td class="border px-4 py-2 ">{{ $mixing->kasar }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-right">M.Energi</th>
                                <td class="border px-4 py-2 ">{{ $mixing->energi }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-right">Ca</th>
                                <td class="border px-4 py-2 ">{{ $mixing->ca }}%</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-right">P</th>
                                <td class="border px-4 py-2 ">{{ $mixing->p }}%</td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table-auto w-full">
                        <label for="">Total Harga/Pakan</label>
                        <tbody>
                            @foreach ($total_per_pakan as $item)
                                <tr>
                                    <th class="border px-4 py-2 text-right">{{ $item->pakan->name }}</th>
                                    <td class="border px-4 py-2 ">Rp{{ number_format($item->total_harga) }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <table class="table-auto w-full">
                        <label for="">Total Harga/Pakan</label>
                        <tbody>
                            @foreach ($total_per_pakan as $item)
                                <tr>
                                    <th class="border px-4 py-2 text-right">{{ $item->pakan->name }}</th>
                                    <td class="border px-4 py-2 ">Rp{{ number_format($item->total_harga) }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <table class="table-auto w-full">
                        <label for="">Total Harga (Semua Pakan) </label>
                        <tbody>
                            <tr>
                                <th class="border px-4 py-2 text-right">Total Harga(Rp)</th>
                                <td class="border px-4 py-2 ">Rp{{ number_format($total_semua_pakan->total_harga) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table-auto w-full">
                        <label for="">Detail Pakan</label>
                        <tbody>

                            @foreach ($total_per_pakan as $item)
                                <tr>
                                    <th class="border px-4 py-2 text-center">{{ $item->pakan->name }}</th>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>





        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
@endsection
