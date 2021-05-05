<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novi kontakt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('store') }}" method="POST" >
                 @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Ime i prezime:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Ime i prezime">
                        </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Godine:</strong>
                        <textarea class="form-control" style="height:50px" name="age" placeholder="godine"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Adresa stanovanja:</strong>
                        <input type="text" name="address"  class="form-control" placeholder="adresa stanovanja">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Broj mobitela:</strong>
                        <input type="text" name="mobile" class="form-control" placeholder="broj mobitela">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>E-mail adresa:</strong>
                        <input type="text" name="email" class="form-control" placeholder="e-mail adresa">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Trenutno stanje tekućeg računa:</strong>
                        <input type="number" name="currentaccountbalance" class="form-control" placeholder="stanje tekućeg računa">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Iznos kredita:</strong>
                        <input type="number" name="credit" class="form-control" placeholder="iznos kredita">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>

                </form>

            
              </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</x-app-layout>