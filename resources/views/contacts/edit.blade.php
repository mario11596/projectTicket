<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Uređivanje klijenta') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-200">
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


                <form action="{{ route('update', $contact->id) }}" method="POST" >
                 @csrf
                

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Ime i prezime:</strong>
                            <input type="text" name="name" id="name" value="{{ $contact->name}}" class="form-control" placeholder="Ime i prezime">
                        </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Godine starosti:</strong>
                        <input class="form-control" style="height:50px" name="age" id="age" type="number" value="{{ $contact->age}}" placeholder="godine"/>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Adresa stanovanja:</strong>
                        <input type="text" name="address" id="address" value="{{ $contact->address}}" class="form-control" placeholder="adresa stanovanja">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Broj mobilnog telefona:</strong>
                        <input type="text" name="mobile" id="mobile" value="{{ $contact->mobile}}" class="form-control" placeholder="broj mobitela">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>E-mail adresa:</strong>
                        <input type="text" name="email" id="email" value="{{ $contact->email}}" class="form-control" placeholder="e-mail adresa">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stanje tekućeg računa:</strong>
                        <input type="number" name="currentaccountbalance" id="currentaccountbalance" value="{{ $contact->currentaccountbalance}}" class="form-control" placeholder="stanje tekućeg računa">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Iznos trenutnog kredita:</strong>
                        <input type="number" name="credit" id="credit" value="{{ $contact->credit}}" class="form-control" placeholder="iznos kredita">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Odobri promjenu</button>
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