<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novi kontakt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('index') }}" class="btn btn-warning">Vrati se natrag</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


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
                        <strong>Godine starosti:</strong>
                        <input class="form-control" name="age" type="number"  placeholder="godine starosti"/>
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
                        <strong>Broj mobilnog telefona:</strong>
                        <input type="text" name="mobile" class="form-control" placeholder="broj mobilnog telefona">
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
                        <strong>Stanje tekućeg računa:</strong>
                        <input type="number" name="currentaccountbalance" class="form-control" placeholder="stanje tekućeg računa">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Iznos trenutnog kredita:</strong>
                        <input type="number" name="credit" class="form-control" placeholder="iznos kredita">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Spremi kontakt</button>
                </div>

                </div>
                </form>

            
              </div>
            </div>
        </div>
    </div>
</x-app-layout>