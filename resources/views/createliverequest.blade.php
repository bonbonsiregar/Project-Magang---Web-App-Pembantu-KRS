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

                <div class="flex items-center justify-center">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/dashboard/store" method="post">
                        {{ csrf_field() }}
                        <div class="mb-4">
                        Pilih Semester:
                        <select name="semester_id">
                            @foreach($allsemester as $sm)
                            <option value="{{$sm->id}}">{{$sm->nama_semester}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-4">
                        Semester <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="semester" required="required"> <br/>
                        </div>
                        <div class="mb-4">
                        Kode Mata Kuliah <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="k_mk" required="required"> <br/>
                        </div>
                        <div class="mb-4">
                        Mata Kuliah <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="mk" required="required"> <br/>
                        </div>
                        <div class="mb-4">
                        SKS <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="sks" required="required"> <br/>
                        </div>
                        <div class="mb-4">
                        Available Seats <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="a_seats" required="required"> <br/>
                        </div>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="flex items-center justify-center">
                        <input type="submit" value="Simpan Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
