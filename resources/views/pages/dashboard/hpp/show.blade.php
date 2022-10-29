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
    @dd($hpp);
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <table class="table table-striped table-bordered">

                <thead>
                    <h1 class="header-hpp">PERHITUNGAN HARGA POKOK PENJUALAN ( HPP ) TELUR
                    </h1>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">A.</th>
                        <td><b>Bangunan Kandang</b></td>
                        <td></td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Kandang Dengan Kapasitas 3200 Ekor, Asumsi Rumah tahan 20 thn (13 periode) dan Battry tahan
                            6 tahun (4 periode) 70.000.000</td>
                        <td>
                            @foreach ($hpp as $item)
                                {{ $item->bangunan }} /Kg Telur
                            @endforeach
                        </td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
'
