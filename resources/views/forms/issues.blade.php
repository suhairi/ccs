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
                          <td class="text-center">Serangan Perosak</td>
                          <td>
                            <select name="perosak" multiple>
                              @foreach($perosaks as $perosak)
                                <option value="{{ $perosak->id }}">{{ $perosak->nama }}</option>
                              @endforeach

                            </select>
                          </td>
                          <td><input type="text" name="peratusPerosak" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <tr class="border">
                          <td class="text-center">Serangan Penyakit</td>
                          <td>
                            <select name="penyakit" multiple>
                              @foreach($penyakits as $penyakit)
                                <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                              @endforeach

                            </select>
                          </td>
                          <td><input type="text" name="peratusPenyakit" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <tr class="border">
                          <td class="text-center">Bencana</td>
                          <td>
                            <select name="bencana" multiple>
                              @foreach($bencanas as $bencana)
                                <option value="{{ $bencana->id }}">{{ $bencana->nama }}</option>
                              @endforeach

                            </select>
                          </td>
                          <td><input type="text" name="peratusBencana" value="0" onClick="this.select();"></td>
                        </tr>
                        <tr class="border">
                          <tr class="border">
                          <td class="text-center">Isu Lain</td>
                          <td><textarea name="isulain" placeholder="Taip..."></textarea></td>
                          <td><input type="text" name="peratusIsulain" value="0" onClick="this.select();"></td>
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
