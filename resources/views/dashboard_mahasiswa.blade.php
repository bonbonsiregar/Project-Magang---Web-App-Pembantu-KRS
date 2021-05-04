<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Mahasiswa!
                    {{ Auth::user()->id }}
                </div>

                <div>
                    <table class="shadow-lg bg-auto">
                        <tr>
                            <th class="bg-blue-100 border text-left px-8 py-4">No.</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Kode Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">SKS</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Semester</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Semester TA</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Available Seats</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Action</th>
                        </tr>
                        @foreach($mk as $m)
                        <tr>
                            <td class="border px-8 py-4">#</td>
                            <td class="border px-8 py-4">{{ $m->k_mk }}</td>
                            <td class="border px-8 py-4">{{ $m->mk }}</td>
                            <td class="border px-8 py-4">{{ $m->sks }}</td>
                            <td class="border px-8 py-4">{{ $m->semester }}</td>
                            <td class="border px-8 py-4">{{ $m->available_seats }}</td>
                            <td class="border px-8 py-4">
                                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('/dashboard/requestkrs',$m->id) }}">Request Kelas</a></button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 bg-gray-200">
                    <div class="p-4 flex">
                        <h1 class="text-3xl">
                            KRS
                        </h1>
                    </div>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Name</th>
                                    <th class="text-left p-3 px-5">Email</th>
                                    <th class="text-left p-3 px-5">Role</th>
                                    <th></th>
                                </tr>
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="{{ Auth::user()->name }}" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="{{ Auth::user()->email }}" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="{{ Auth::user()->roles->first()->display_name }}" class="bg-transparent"></td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>

                                <tr class="border-b hover:bg-orange-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-orange-100">
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.role" class="bg-transparent">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
