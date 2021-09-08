<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistem CCS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 text-xl">
                   Maklumat Musim
                </div>

                <form class="w-full max-w-sm" method="POST" action="{{ route('storeMusim') }}">
                @csrf

                  <input type="hidden" name="pesawah_id" value="{{ $farmer->id }}">

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
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Musim
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-full-name" name="musim">
                        <option class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" value="">Pilih</option>
                        <option class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" value="1">Musim 1</option>
                        <option class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" value="2">Musim 2</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Fasa Tanaman
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" type="text">
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Lokaliti
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" name="locality_id">
                        <option value="">Pilih...</option>
                        @foreach($localities as $locality)
                          <option  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" value="{{ $locality['id'] }}">{{ $locality['nama'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        No Lot
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" type="text" name="noLot">
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Luas Lot (hektar)
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" type="text" name="luasLot">
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Luas Usaha (hektar)
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" type="text" name="luasUsaha">
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Koordinat Sawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" type="text" name="koordinat">
                    </div>
                  </div>
                  
                   
                  <div class="md:flex md:items-center">
                    <div class="md:w-5/12"></div>
                    <div class="md:w-7/12">
                      <button class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Hantar
                      </button>
                    </div>
                  </div>
                </form>
                <br />
            </div>
        </div>
    </div>
</x-app-layout>
