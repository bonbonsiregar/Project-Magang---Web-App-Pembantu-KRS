<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Request Berdasarkan Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Nama: {{\Illuminate\Support\Facades\Auth::user()->name}} <br>
                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}} <br>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <table class="w-full shadow-lg bg-auto table-auto">
                            <tr>
                                <th class="bg-blue-100 border text-left px-8 py-4">Kode Mata Kuliah</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Mata Kuliah</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">ID Mahasiswa</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Nama Mahasiswa</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Status Request</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Action</th>

                            </tr>
                            @foreach($req as $reqs)
                                <tr>
                                    <td class="border px-8 py-4">{{ $reqs->k_mk }}</td>
                                    <td class="border px-8 py-4">{{ $reqs->mk }}</td>
                                    <td class="border px-8 py-4">{{ $reqs->id_mhs }}</td>
                                    <td class="border px-8 py-4">{{ $reqs->name }}</td>
                                    <td class="border px-8 py-4">
                                        @if($reqs->status_request == 0)
                                            PENDING
                                        @elseif($reqs->status_request == 1)
                                            APPROVED
                                        @else
                                            REJECTED
                                        @endif
                                    </td>
                                    @if(Auth::user()->hasRole('admin'))
                                    <td class="border px-8 py-4">
                                        @if ($reqs->status_request == 0)
                                            <button type="button" class="mr-3 text-sm bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href={{ url('/dashboard/approve',$reqs->id) }}>APPROVE</a></button>
                                            <button type="button" class="mr-3 text-sm bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('dashboard/reject', $reqs->id) }}">REJECT</a></button>
                                        @else
                                            <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-green-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">APPROVE</a></button>
                                            <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-red-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">REJECT</a></button>
                                        @endif
                                    </td>
                                    @elseif(Auth::user()->hasRole('dosen'))
                                        <td class="border px-8 py-4">
                                            <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-green-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">APPROVE</a></button>
                                            <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-red-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">REJECT</a></button>
                                    @endif
                                </tr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
