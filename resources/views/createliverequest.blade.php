<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Kaprodi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as {{ Auth::user()->name }}! <br>
                    Nama: {{\Illuminate\Support\Facades\Auth::user()->name}} <br>
                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}}
                </div>

                <div>
                    <form action="/dashboard/store" method="post">
                        {{ csrf_field() }}
                        <select name="semester_ta">
                            <option value="ganjil">Ganjil 2020/2021</option>
                            <option value="antara">Antara 2020/2021</option>
                            <option value="ganjil">Genap 2020/2021</option>
                        </select>
                        Semester <input name="semester" required="required"> <br/>
                        Kode Mata Kuliah <input type="text" name="k_mk" required="required"> <br/>
                        Mata Kuliah <input type="text" name="mk" required="required"> <br/>
                        SKS <input type="number" name="sks" required="required"> <br/>
                        Available Seats <input name="a_seats" required="required"> <br/>
                        <input type="submit" value="Simpan Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
