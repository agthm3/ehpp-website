'<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pakan
        </h2>
    </x-slot>
    @dd($hpp);

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Pakan Detail</h2>
            <br>
            <form action="" method="POST">
                @csrf

                <button class="bg-green-500 text-white rounded-md px-6 py-1 m-2" type="submit">Hitung</button>
            </form>
            <br>
            <hr>



            <div class="col-lg-6"><a href="" class="bg-green-500 text-white rounded-md px-6 py-1 m-2">
                    Edit </a>



            </div>





            <div class="row">



            </div>

        </div>
    </div>
</x-app-layout>
'
