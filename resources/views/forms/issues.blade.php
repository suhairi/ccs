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
            </div>
          </div>

          <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white bg-blue-200 border-b border-gray-200 text-xl font-bold">
                     Isu Tanaman
                  </div> 
              </div>            
          </div>

          <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-sm font-bold">

                  <form class="w-full max-w-sm" method="POST" action="{{ route('storeIssues') }}">
                  @csrf
                  <input type="hidden" name="season_id" value="{{ Session::get('season_id') }}">
                  <div class="md:flex md:items-center mb-2 mt-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Nama Pesawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-full-name" name="nama" value="{{ $farmer->nama }}" type="text" required>
                    </div>
                  </div>
                  <input type="hidden" name="farmer_id" value="{{ Session::get('farmer_id') }}">
                  <table class="w-full tr-even:bg-grey-light">
                    <tr class="border">
                      <td><strong>Serangan</strong></td>
                      <td align="center"><strong>Jenis Kerosakan</strong></td>
                      <td><strong>% Kerosakan</strong></td>
                    </tr>
                    <tr class="border">
                      <td class="text-center" rowspan="8">Serangan Perosak</td>
                      <td><input type="text" name="" value="TIKUS" readonly=""></td>
                      <td><input type="text" name="tikus" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="SIPUT GONDANG" readonly=""></td>
                      <td><input type="text" name="siputgondang" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="KUTU THRIP" readonly=""></td>
                      <td><input type="text" name="kutuThrip" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="ULAT PENGOREK BATANG" readonly=""></td>
                      <td><input type="text" name="pengorekBatang" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="ULAT GULUNG DAUN" readonly=""></td>
                      <td><input type="text" name="gulungDaun" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="ULAT LAYAR" readonly=""></td>
                      <td><input type="text" name="ulatLayar" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="BENA PERANG" readonly=""></td>
                      <td><input type="text" name="benaPerang" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="KESING" readonly=""></td>
                      <td><input type="text" name="kesing" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td class="text-center" rowspan="4">Serangan Penyakit</td>
                      <td><input type="text" name="" value="KARAH"></td>
                      <td><input type="text" name="karah" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="HAWAR DAUN BAKTERIA"></td>
                      <td><input type="text" name="daunBakteria" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="HAWAR SELUDANG"></td>
                      <td><input type="text" name="hawarSeludang" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="BINTIK PERANG"></td>
                      <td><input type="text" name="bintikPerang" value="0" onClick="this.select();"></td>
                    </tr>                    
                    <tr class="border">
                      <td class="text-center" rowspan="4">Bencana</td>
                      <td><input type="text" name="" value="REBAH"></td>
                      <td><input type="text" name="rebah" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="KEMARAU"></td>
                      <td><input type="text" name="kemarau" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="BANJIR"></td>
                      <td><input type="text" name="banjir" value="0" onClick="this.select();"></td>
                    </tr>
                    <tr class="border">
                      <td><input type="text" name="" value="LAIN"></td>
                      <td><input type="text" name="bencanaLain" value="0" onClick="this.select();"></td>
                    </tr>                    
                    <tr class="border">
                      <td class="text-center">Isu Lain</td>
                      <td><textarea name="isulain" placeholder="Taip..."></textarea></td>
                      <td><input type="text" name="isuLain" value="0" onClick="this.select();"></td>
                    </tr>                        
                  </table>             
                </div>
                
                <div class="md:flex md:items-center">
                  <div class="md:w-5/12"></div>
                  <div class="md:w-7/12">
                    <button class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Rekod >>
                    </button>
                  </div>
                </div>
                </form>
                <br />

                @if($errors->any())
                  <div class="py-12 bg-gray-200">
                    @foreach($errors->all() as $error)
                      <div class="text-red-500 ml-4">{{ $error }}</div>
                    @endforeach
                  </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
