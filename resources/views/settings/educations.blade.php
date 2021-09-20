<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistem CCS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if ($message = Session::get('success'))
                  <div class="p-6 bg-white bg-green-200 border-b border-gray-200 text-xl font-bold">
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                  </div>
                @endif
                @if ($message = Session::get('error'))
                  <div class="p-6 bg-white bg-red-200 border-b border-gray-200 text-xl font-bold">
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                  </div>
                @endif

                <div class="p-6 bg-white border-b border-gray-200 text-md font-bold text-right">
                   [ <a href="{{ url('/register') }}" class="text-blue-500">Add Education</a> ]
                </div> 
            </div>            
        </div>
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white bg-blue-200 border-b border-gray-200 text-xl font-bold">
                   Settings :: Educations
                </div> 
            </div>            
        </div>
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9 mb-4">
          <table class="w-full overflow-hidden shadow-lg rounded">
            <thead>
              <tr>
                <th>No</th>
                <th class="text-left">Nama</th>
                <th class="text-left">Pilihan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($educations as $education)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $education->nama }}</td>
                  <td>[ <a href="#" class="text-blue-500">Modify</a> ] [ <a href="{{ route('settings.delEdu', $education->id) }}" class="text-blue-500">Delete</a> ]</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
    </div>

</x-app-layout>
