<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistem CCS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($message = Session::get('success'))
                  <div class="p-6 bg-white bg-green-200 border-b border-gray-200 text-xl font-bold">
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                  </div>
                  <br />
                @endif
                @if ($message = Session::get('fail'))
                  <div class="p-6 bg-white bg-red-200 border-b border-gray-200 text-xl font-bold">
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                  </div>
                  <br />
                @endif
                <div class="p-6 bg-blue-200 border-b border-gray-200 text-xl">
                   Maklumat Bancian Pesawah
                </div>

                <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-white border-b border-gray-200 text-sm font-bold">
                        <table class="w-full tr-even:bg-grey-light"></div>
                            <thead>
                                <tr class="bg-gray-300">
                                    <th colspan="3">Maklumat Asas Pesawah</th>
                                </tr>                            
                            </thead>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td>{{ $season->farmer->nama }}</td>
                            </tr>
                            <tr>
                              <td>No KP</td>
                              <td>:</td>
                              <td>{{ $season->farmer->nokp }}</td>
                            </tr>
                            <tr>
                              <td>Taraf Pendidikan</td>
                              <td>:</td>
                              <td>{{ $season->farmer->education->nama }}</td>
                            </tr>
                            <tr>
                              <td>Hak Milik</td>
                              <td>:</td>
                              <td>{{ $season->farmer->milikan->nama }}</td>
                            </tr>
                            <tr>
                              <td>No Telefon</td>
                              <td>:</td>
                              <td>{{ $season->farmer->notel }}</td>
                            </tr>
                            <tr>
                              <td>Alamat Rumah</td>
                              <td>:</td>
                              <td>{{ $season->farmer->alamat }}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <thead>
                                <tr class="bg-gray-300">
                                    <th colspan="3">Maklumat Musim</th>
                                </tr>                            
                            </thead>
                            <tr>
                              <td>Musim</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            <tr>
                              <td>Wilayah</td>
                              <td>:</td>
                              <td>{{ $season->region->nama }}</td>
                            </tr>
                            <tr>
                              <td>Fasa Tanaman</td>
                              <td>:</td>
                              <td>{{ $season->phase }}</td>
                            </tr>
                            <tr>
                              <td>Lokaliti</td>
                              <td>:</td>
                              <td>{{ $season->locality->nama }}</td>
                            </tr>
                            <tr>
                              <td>Lot No</td>
                              <td>:</td>
                              <td>{{ $season->noLot }}</td>
                            </tr>
                            <tr>
                              <td>Luas Lot (hektar)</td>
                              <td>:</td>
                              <td>{{ $season->luasLot }}</td>
                            </tr>
                            <tr>
                              <td>Luas Usaha (hektar)</td>
                              <td>:</td>
                              <td>{{ $season->luasUsaha }}</td>
                            </tr>
                            <tr>
                              <td>Koordinat Sawah</td>
                              <td>:</td>
                              <td>{{ $season->koordinat }}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <thead>
                                <tr class="bg-gray-300">
                                    <th colspan="3">Maklumat Asas Tanaman</th>
                                </tr>                            
                            </thead>
                            <tr>
                              <td>Varieti Padi</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            <tr>
                              <td>Kaedah Tanam</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            <tr>
                              <td>Tarikh Tanam</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            <tr>
                              <td>Tarikh Dijangka Tuai</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            <tr>
                              <td>Tarikh Tuai Sebenar</td>
                              <td>:</td>
                              <td>{{ $season->musim->musim }}</td>
                            </tr>
                            
                            
                        </table>
                            
                        


            </div>
        </div>
    </div>
</x-app-layout>
