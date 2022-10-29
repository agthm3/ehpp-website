'<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hpp Detail
        </h2>
    </x-slot>
    <style>
        .header-hpp {
            text-align: center;
            font-weight: bolder;
        }
    </style>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <table class="table  table-bordered">

                <thead>
                    <h1 class="header-hpp">PERHITUNGAN HARGA POKOK PENJUALAN ( HPP ) TELUR
                    </h1>
                    <tr class="table-secondary">
                        <th scope="col">No</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Detail Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">A.</th>
                        <td><b>Bangunan Kandang</b></td>
                        <td>Kandang Dengan Kapasitas 3200 Ekor, Asumsi Rumah tahan 20 thn (13 periode) dan Battry tahan
                            6 tahun (4 periode) 70.000.000
                        </td>
                        <td>
                            @foreach ($hpp as $item)
                                {{ $item->bangunan }} /Kg Telur
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">B.</th>
                        <td><b>AYAM</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- PULLET --}}
                    <tr>
                        <th scope="row"></th>
                        <td><b>PULLET</b></td>
                        <td>Harga Pulet</td>
                        <td>
                            @foreach ($hpp as $item)
                                Rp{{ number_format($item->pulet) }} / Minggu
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Umur Pulet</td>
                        <td>
                            25/ Minggu
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Harga </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->hargapulet) }} / Ekor
                            @endforeach
                        </td>
                    </tr>
                    {{-- AFKIR --}}
                    <tr>
                        <th scope="row"></th>
                        <td><b>AFKIR</b></td>
                        <td>Harga Afkir </td>
                        <td>
                            @foreach ($hpp as $item)
                                Rp{{ number_format($item->afkir) }} / Lusin
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td> </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->afkir_per_ekor) }} / Ekor
                            @endforeach
                        </td>
                    </tr>
                    {{-- DEPLESI --}}
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Deplesi </td>
                        <td>
                            @foreach ($hpp as $item)
                                {{ number_format($item->deplesi) }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td> </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->deplesi_harga) }}/Ekor
                            @endforeach
                        </td>
                    </tr>
                    {{-- TOTAL BIAYA AYAM --}}
                    <tr>
                        <th scope="row"></th>
                        <td><b>TOTAL BIAYA AYAM</b></td>
                        <td></td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->total_biaya_ayam) }}/Kg Telur
                            @endforeach
                        </td>
                    </tr>
                    {{-- PAKAN --}}
                    <tr>
                        <th scope="row">C.</th>
                        <td><b>PAKAN</b></td>
                        <td>HARGA RAMSUM</td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->total_harga) }}/Kg
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>FCR (Asumsi Sehat)</td>
                        <td>2,5</td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>BIAYA PAKAN</td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->biaya_pakan) }}/Kg Telur
                            @endforeach
                        </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->biaya_pakan_per_rak) }}/Rak
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>TENAGA KERJA</td>
                        <td>
                            @foreach ($hpp as $item)
                                Rp{{ number_format($item->tenaga) }}/Kg Telur
                            @endforeach
                        </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->tenaga_kerja_per_rak) }}/Rak
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>OVK (Obat + Vaksin dll)</td>
                        <td>
                            @foreach ($hpp as $item)
                                Rp{{ number_format($item->ovk) }}/Kg Telur
                            @endforeach
                        </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->ovk_per_rak) }}/Rak
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>PLN + TRANSPORTASI</td>
                        <td>
                            @foreach ($hpp as $item)
                                Rp{{ number_format($item->pln) }}/Kg Telur
                            @endforeach
                        </td>
                        <td>
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->pln_per_rak) }}/Rak
                            @endforeach
                        </td>
                    </tr>
                    <tr class="table-success" style="font-weight: bold">
                        <th scope="row"></th>
                        <td>HARGA POKOK PENJUALAN (HPP)</td>
                        <td colspan="2" style="text-align: right">
                            @foreach ($hpp_record as $item)
                                Rp{{ number_format($item->hpp) }}/Kg
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td colspan="2">Biaya tersebut belum termasuk LAHAN, SOSIAL COST,
                            OPERASIONAL KANDANG, CICILAN HUTANG ( kalau pakai uang Bank ). </td>
                        <td>


                        </td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
'
