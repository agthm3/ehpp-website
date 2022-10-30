@extends('layouts.print')

@section('content')
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">




            <hr>

            <style>
                .header-hpp {
                    text-align: center;
                    font-weight: bolder;
                }
            </style>

            <div class="py-12">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Record Detail >>
                    <?php
                    // Set the new timezone
                    date_default_timezone_set('Asia/Makassar');
                    $date = date('d-m-y h:i:s');
                    echo $date;
                    ?>
                </h2>
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
                                <td>Kandang Dengan Kapasitas 3200 Ekor, Asumsi Rumah tahan 20 thn (13 periode) dan Battry
                                    tahan
                                    6 tahun (4 periode) 70.000.000
                                </td>
                                <td>
                                    {{ $hpp->bangunan }}/Kg Telur
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
                                    Rp{{ number_format($hpp->pulet) }}/Minggu
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
                                    Rp{{ number_format($hpprecord->hargapulet) }}/Ekor
                                </td>
                            </tr>
                            {{-- AFKIR --}}
                            <tr>
                                <th scope="row"></th>
                                <td><b>AFKIR</b></td>
                                <td>Harga Afkir </td>
                                <td>
                                    Rp{{ number_format($hpp->afkir) }}/Lusin
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td> </td>
                                <td>
                                    Rp{{ number_format($hpprecord->afkir_per_ekor) }}/Ekor
                                </td>
                            </tr>
                            {{-- DEPLESI --}}
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td>Deplesi </td>
                                <td>
                                    {{ $hpp->deplesi }}%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td> </td>
                                <td>
                                    {{ number_format($hpprecord->deplesi_harga) }}/Ekor
                                </td>
                            </tr>
                            {{-- TOTAL BIAYA AYAM --}}
                            <tr>
                                <th scope="row"></th>
                                <td><b>TOTAL BIAYA AYAM</b></td>
                                <td></td>
                                <td>
                                    Rp{{ number_format($hpprecord->total_biaya_ayam) }}/Kg Telur
                                </td>
                            </tr>
                            {{-- PAKAN --}}
                            <tr>
                                <th scope="row">C.</th>
                                <td><b>PAKAN</b></td>
                                <td>HARGA RAMSUM</td>
                                <td>
                                    Rp{{ number_format($hpprecord->total_harga) }}/Kg
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
                                    Rp{{ number_format($hpprecord->biaya_pakan) }}/Kg Telur
                                </td>
                                <td>
                                    Rp{{ number_format($hpprecord->biaya_pakan_per_rak) }}/Rak
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>TENAGA KERJA</td>
                                <td>
                                    Rp{{ number_format($hpp->tenaga) }}/Kg Telur
                                </td>
                                <td>
                                    Rp{{ number_format($hpprecord->tenaga_kerja_per_rak) }}/Rak
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>OVK (Obat + Vaksin dll)</td>
                                <td>
                                    Rp{{ number_format($hpp->ovk) }}/Kg Telur
                                </td>
                                <td>
                                    Rp{{ number_format($hpprecord->ovk_per_rak) }}/Rak
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>PLN + TRANSPORTASI</td>
                                <td>
                                    Rp{{ number_format($hpp->pln) }}/Kg Telur
                                </td>
                                <td>
                                    Rp{{ number_format($hpprecord->pln_per_rak) }}/Rak
                                </td>
                            </tr>
                            <tr class="table-success" style="font-weight: bold">
                                <th scope="row"></th>
                                <td>HARGA POKOK PENJUALAN (HPP)</td>
                                <td colspan="2" style="text-align: right">
                                    Rp{{ number_format($hpprecord->hpp) }}/Kg
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





        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
@endsection
