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
                <div class="p-6 bg-blue-200 border-b border-gray-200 text-xl">
                   Maklumat Musim
                </div>
                <form class="w-full max-w-sm" method="POST" action="{{ route('carianPesawah') }}">
                @csrf
                  <div class="md:flex md:items-center mb-2 mt-1">
                    <div class="md:w-5/12">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Carian Pesawah
                      </label>
                    </div>
                    <div class="md:w-7/12">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-200" id="inline-full-name" type="text" name="namaPesawah">
                    </div>
                    <div class="md:flex md:items-center border-b-4">
                        <div class="md:w-5/12"></div>
                        <div class="md:w-7/12">
                          <button class="shadow bg-blue-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Hantar
                          </button>
                        </div>
                    </div>
                  </div>
                  
                  
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
