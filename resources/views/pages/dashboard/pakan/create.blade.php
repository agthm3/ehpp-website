<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambahkan Pakan Baru
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

                <form action="{{ route('dashboard.pakan.store') }}" class="w-full" method="post"
                    enctype="multipart/form-data">
                    {{-- setiap inputan tambahkan csrf --}}
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Nama
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="text" value="{{ old('name') }}" name="name"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder="Nama Pakan">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 ">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Description
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <textarea value="{{ old('description') }}" name="description"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"> {!! old('description') !!}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Harga
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('price') }}" name="price"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Protein
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('protein') }}" name="protein"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Lemak
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('lemak') }}" name="lemak"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Serat
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('serat') }}" name="serat"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Energi
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('energi') }}" name="energi"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Ca
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('ca') }}" name="ca"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                P
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('p') }}" name="p"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">
                                Mixing
                            </label>
                            {{-- fungsi dari function "old" inputan akan tetap ada walapun salah --}}
                            <input type="number" value="{{ old('price') }}" name="price"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 
                                                                                        rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus-border-gray-500"
                                placeholder=" ">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit" style="background-color:#064e3b"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                Simpan Pakan
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
