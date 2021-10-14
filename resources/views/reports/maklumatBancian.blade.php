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
                    <div class="p-6 bg-white border-b border-gray-200 text-sm font-bold">
                      <table class="w-full tr-even:bg-grey-light"></div>
                        <thead>
                            <tr class="bg-gray-300">
                                <th>No</th>
                                <th class="text-left">Nama</th>
                                <th class="text-left">No KP</th>
                                <th class="text-left">Jantina</th>
                                <th class="text-left">Milikan</th>
                                <th class="text-left">No Tel</th>
                                <th class="text-left">Alamat</th>
                            </tr>
                        </thead>
                        <tr>
                          
                        </tr>
                



            </div>
        </div>
    </div>
</x-app-layout>
