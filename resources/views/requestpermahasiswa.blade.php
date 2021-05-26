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
{{--                    You're logged in as {{ Auth::user()->name }}! <br>--}}
{{--                    Nama: {{\Illuminate\Support\Facades\Auth::user()->name}} <br>--}}
{{--                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}}--}}
                    Tabel Request per Mahasiswa
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="#">APPLY ALL</a></button>
                </div>

                <div class="flex-auto">
                    <table class="w-full shadow-lg 2xl:bg-auto">
                        <tr>
                            <th class="bg-blue-100 border text-left px-8 py-4">ID Mahasiswa</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Nama Mahasiswa</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">View Requests</th>
                        </tr>
                        @foreach($getmahasiswa as $m)
                            <tr>
                                <td class="border px-8 py-4">{{ $m->id_mhs }}</td>
                                <td class="border px-8 py-4">{{ $m->name }}</td>
                                <td class="border px-8 py-4">
                                    <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('dashboard/nameasrequest', $m->id_mhs) }}">VIEW</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
