<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Admin!
                </div>
                {{-- <div class="btn-group mb-4 mt-4 ml-4">
                <button type="button" class="btn btn-primary dropdown-toogle" data-bs-toogle="dropdown" aria-expanded="false">
                    Notifications <span class="badge badge-light">{{ $notif }}</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                </div> --}}
                <div class="btn-group">
                    <button class="btn btn-primary btn-lg" type="button">
                      Notifications: {{ $notif }}
                    </button>
                    <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                    @foreach ($name as $requests)
                    <li><a class="dropdown-item" href={{ url('/dashboard/nameasrequest',$requests->id_mhs) }}>{{ $requests->name }} | {{ $requests->id_mhs }}</a></li>
                    {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li> --}}
                    @endforeach
                    </ul>
                  </div>
                <div>
                    <table class="shadow-lg bg-auto">
                        <tr>
                            <th class="bg-blue-100 border text-left px-8 py-4">Kode Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Angkatan</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Requested Seats</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Status Request</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Action</th>
                        </tr>
                        @foreach($lr2 as $m)
                        <tr>
                            <td class="border px-8 py-4">{{ $m->k_mk }}</td>
                            <td class="border px-8 py-4">{{ $m->mk }}</td>
                            <td class="border px-8 py-4">{{ $m->angkatan }}</td>
                            <td class="border px-8 py-4">{{ $m->request_seats }}</td>
                            <td class="border px-8 py-4">{{ ($m->status_request == 0) ? "PENDING" : "APPROVED" }}
                            </td>
                            <td class="border px-8 py-4">
                                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href={{ url('/dashboard/approve',$m->id) }}>APPROVE</a></button>
                                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('dashboard/reject', $m->id) }}">REJECT</a></button>
                            </td>
                        </tr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
