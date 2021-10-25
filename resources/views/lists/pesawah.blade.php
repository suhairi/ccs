<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistem CCS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white bg-blue-200 border-b border-gray-200 text-xl font-bold">
                   Senarai :: Pesawah
                </div> 
            </div>            
        </div>
        <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-sm font-bold">
                  <table class="w-full tr-even:bg-grey-light"></div>
                    <thead>
                        <tr class="bg-gray-300">
                            <th>No</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">No KP</th>
                            <th class="text-left">Jantina</th>
                            <th class="text-left">Umur</th>
                            <th class="text-left">Pendidikan</th>
                            <th class="text-left">Milikan</th>
                            <th class="text-left">No Tel</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($farmers as $farmer)
                        <tr>
                          <td class="text-center" valign="top">{{ $loop->iteration }}</td>
                          <td valign="top">{{ ucwords(strtolower($farmer->nama)) }}</td>
                          <td valign="top">{{ $farmer->nokp }}</td>
                          <td class="text-center" valign="top">{{ substr($farmer->jantina, 0, 1) }}</td>
                          <td class="text-center" valign="top">{{ $farmer->umur }}</td>
                          <td valign="top">{{ $farmer->education->nama }}</td>
                          <td valign="top">{{ $farmer->milikan->nama }}</td>
                          <td valign="top">{{ $farmer->notel }}</td>
                          <td valign="top">{{ ucwords(strtolower($farmer->alamat)) }}</td>
                          <td>[ <a href="{{ route('pesawah.update.form', $farmer->id) }}" class="text-blue-500">Modify</a> ] [ <a href="#" class="text-blue-500">Delete</a> ]</td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
        
    </div>

</x-app-layout>
