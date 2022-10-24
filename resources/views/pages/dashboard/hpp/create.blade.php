<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perhitungan HPP
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- membuat pesan eror --}}
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ url('dashboard/hpp') }}" class="w-full" method="post" enctype="multipart/form-data">
                    {{-- setiap inputan tambahkan csrf --}}
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Bangunan Kandang

                            </label>
                            <p class="fs-6 text-muted">KANDANG Dengan kapasitas 3200 Ekor, Asumsi RUMAH Tahan
                                20
                                th ( 13
                                priode )dan Battry tahan 6 tahun ( 4 priode )</p>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('bangunan') }}" name="bangunan"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>


                    {{-- AYAM SECTION --}}
                    <br>

                    <h3><b>AYAM</b></h3>
                    <hr>
                    <br>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                PULET (Harga Pulet/ Minggu)
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('pulet') }}" name="pulet"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                HARGA AFKIR
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('afkir') }}" name="afkir"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                DEPLESI AFKIR (%)
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('deplesi') }}" name="deplesi"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                PRODUKSI (Asumsi sangat baik)
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('produksi') }}" name="produksi"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>
                    <br>

                    <hr>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                <b>PAKAN</b>
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <select value="{{ old('pakan') }}" name="pakan"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                                @foreach ($record as $item)
                                    <option value="{{ $item->code }}">
                                        {{ $item->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                <b>TENAGA KERJA (Kg/Telur)</b>
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('tenaga') }}" name="tenaga"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                <b>OVK (Obat + Vaksin dll)</b>
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('ovk') }}" name="ovk"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                <b>PLN/Transportasi</b>
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('pln') }}" name="pln"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="  ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit" style="background-color: #14532d"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                Hitung HPP
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</x-app-layout>
