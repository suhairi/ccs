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
                   Maklumat Pembajaan
                </div>

                <form class="w-full max-w-sm" method="POST" action="{{ route('storeTanaman') }}">
                @csrf

                  <input type="hidden" name="pesawah_id" value="{{ Session::get('pesawah_id') }}">

                  <div class="md:flex md:items-center mb-2 mt-1">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Pesawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-full-name" type="text" name="nama" readonly="true" value="{{ $farmer->nama }}">
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2 mt-1">
                    <div class="md:w-5/12">
                      <div class="md:w-7/12">
                        <table class="table-fixed border-2 rounded">
                          <tr class="border">
                            <td><strong>Jenis baja</strong></td>
                            <td><strong>Kekerapan</strong></td>
                            <td><strong>Tarikh</strong></td>
                            <td><strong>KG/Relung</strong></td>
                          </tr>
                          <tr class="border">
                            <td rowspan="2">Sebatian</td>
                            <td class="text-center">1</td>
                            <td><input type="date" name="tarikh1Sebatian"></td>
                            <td><input type="text" name="kg1RelungSebatian" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td class="text-center">2</td>
                            <td><input type="date" name="tarikh2Sebatian"></td>
                            <td><input type="text" name="kg2RelungSebatian" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td rowspan="2">Urea</td>
                            <td class="text-center">1</td>
                            <td><input type="date" name="tarikh1Urea"></td>
                            <td><input type="text" name="kg1RelungUrea" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td class="text-center">2</td>
                            <td><input type="date" name="tarikh2Urea"></td>
                            <td><input type="text" name="kg2RelungUrea" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td rowspan="2">Sebatian Tambahan</td>
                            <td class="text-center">1</td>
                            <td><input type="date" name="tarikh1Urea"></td>
                            <td><input type="text" name="kg1RelungSebatianTambahan" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td class="text-center">2</td>
                            <td><input type="date" name="tarikh2Urea"></td>
                            <td><input type="text" name="kg2RelungSebatianTambahan" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td rowspan="2">Lain</td>
                            <td class="text-center">1</td>
                            <td><input type="date" name="tarikh1Lain"></td>
                            <td><input type="text" name="kg1RelungLain" value="0"></td>
                          </tr>
                          <tr class="border">
                            <td class="text-center">2</td>
                            <td><input type="date" name="tarikh2Lain"></td>
                            <td><input type="text" name="kg2RelungLain" value="0"></td>
                          </tr>
                          
                          
                          

                        </table>
                      </div>


                    </div>
                  </div>
                  <br /><br />
           
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
