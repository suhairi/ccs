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
                <div class="p-6 bg-white bg-blue-200 border-b border-gray-200 text-xl font-bold">
                   Maklumat Pesawah
                </div>
                <form method="POST" action="{{ route('postPesawah') }}" class="w-full max-w-sm">
                @csrf
                  <div class="md:flex md:items-center mb-2 mt-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Nama Pesawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-full-name" name="nama" value="{{ old('nama') }}" type="text" required>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        No KP
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" name="nokp" value="{{ old('nokp') }}" type="text" required placeholder="Contoh: 991211025567">
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Taraf Pendidikan
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-password" name="education_id">
                        <option value="">Pilih...</option>
                        @foreach($educations as $key => $education)
                          <option  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" value="{{ $key }}">{{ $education }}</option>
                        @endforeach
                      </select>                      
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Status Hak Milik Sawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" name="milikan" value="{{ old('milikan') }}" required>
                        <option value="">Pilih...</option>
                        <option value="MILIK">Milik Sendiri</option>
                        <option value="SEWA">Sewa</option>
                        <option value="BSTS">BSTS</option>
                      </select>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        No Tel
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" name="notel" type="text" value="{{ old('notel') }}" required>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-2">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Alamat Rumah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <textarea class="bg-gray-200 appearance-none border-gray-200 focus:bg-white appearance-none border-2 rounded w-full focus:outline-none leading-tight focus:border-purple-200" name="alamat" required>{{ old('alamat') }}</textarea>
                    </div>
                  </div>                  
                  
                  <div class="md:flex md:items-center border-b-4">
                    <div class="md:w-5/12"></div>
                    <div class="md:w-7/12">
                      <button class="shadow bg-blue-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Hantar
                      </button>
                    </div>
                  </div>
                </form>

                
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
