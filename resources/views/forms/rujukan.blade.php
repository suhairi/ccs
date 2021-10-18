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
                     Maklumat Pembajaan
                  </div> 
              </div>            
          </div>

          <div class="max-w-7xl mx-auto md:px-12 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-sm font-bold">

                  <form class="w-full max-w-sm" method="POST" action="{{ route('storeFertilizer') }}">
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
                          <td><strong>Jenis baja</strong></td>
                          <td><strong>Kekerapan</strong></td>
                          <td><strong>Tarikh</strong></td>
                          <td><strong>KG/Relung</strong></td>
                        </tr>
                        <tr class="border">
                          <td rowspan="2">Sebatian</td>
                          <td class="text-center">1</td>
                          <td><input type="date" name="sebatian1Date"></td>
                          <td><input type="text" name="sebatian1" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td class="text-center">2</td>
                          <td><input type="date" name="sebatian2Date"></td>
                          <td><input type="text" name="sebatian2" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td rowspan="2">Urea</td>
                          <td class="text-center">1</td>
                          <td><input type="date" name="urea1Date"></td>
                          <td><input type="text" name="urea1" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td class="text-center">2</td>
                          <td><input type="date" name="urea2Date"></td>
                          <td><input type="text" name="urea2" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td rowspan="2">Sebatian Tambahan</td>
                          <td class="text-center">1</td>
                          <td><input type="date" name="tambahan1Date"></td>
                          <td><input type="text" name="tambahan1" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td class="text-center">2</td>
                          <td><input type="date" name="tambahan2Date"></td>
                          <td><input type="text" name="tambahan2" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td rowspan="2">Lain</td>
                          <td class="text-center">1</td>
                          <td><input type="date" name="lain1Date"></td>
                          <td><input type="text" name="lain1" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <td class="text-center">2</td>
                          <td><input type="date" name="lain2Date"></td>
                          <td><input type="text" name="lain2" value="0" onClick="this.select();"></td>
                        </tr>

                      </table>
             
                </div>
                
                <div class="md:flex md:items-center">
                  <div class="md:w-5/12"></div>
                  <div class="md:w-7/12">
                    <button class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Seterusnya >>
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
