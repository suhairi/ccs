<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistem CCS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-md font-bold text-right">
                   [ <a href="{{ url('/register') }}" class="text-blue-500">Add Users</a> ]
                </div> 
            </div>            
        </div>
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white bg-blue-200 border-b border-gray-200 text-xl font-bold">
                   Settings :: Users
                </div> 
            </div>            
        </div>
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9 mb-4">
          <table class="w-full overflow-hidden shadow-lg rounded">
            <thead>
              <tr>
                <th>No</th>
                <th class="text-left">Nama</th>
                <th class="text-left">Email</th>
                <th class="text-left">Pilihan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>[ <a href="#" class="text-blue-500">Modify</a> ] [ <a href="#" class="text-blue-500">Delete</a> ]</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
    </div>

</x-app-layout>
