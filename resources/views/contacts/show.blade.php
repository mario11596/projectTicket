<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Pojedinosti o kontaktu') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href="{{ route('index') }}" class="btn btn-warning">Vrati se natrag</a>
             
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Službeni bankar:</strong>
                                {{ $contact->user->name}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ime i prezime:</strong>
                                {{ $contact->name}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Godine starosti:</strong>
                                {{ $contact->age}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Adresa stanovanja:</strong>
                                {{ $contact->address}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Broj mobilnog telefona:</strong>
                                {{ $contact->mobile}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>E-mail adresa:</strong>
                                {{ $contact->email}}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Stanje tekućeg računa:</strong>
                                {{ $contact->currentaccountbalance}} kn
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Iznos trenutnog kredita:</strong>
                                {{ $contact->credit}} kn
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Spremljen u bazu:</strong>
                                {{ $contact->created_at}} 
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ažurirane promjene:</strong>
                                {{ $contact->updated_at}} 
                            </div>
                        </div>
                        
                        @foreach($tickets as $ticket)
                            @if($ticket->contact_id == $contact->id)
                                <div class="py-9">
                                    <div class="card ">
                                        <div class="card-header">
                                            <div class="form-group">
                                                <strong>Naslov zahtjeva:</strong>
                                                {{ $ticket->title }}
                                            </div>
                                        </div>

                                        <div class="card-body">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Broj zahtjeva:</strong>
                                                {{ $number = $number + 1}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Vrsta zahtjeva:</strong>
                                                {{ $ticket->category->name }}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Status zahtjeva:</strong>
                                                @if($ticket->status == 'Otvoreno')
                                                    <p class="text-danger">{{ $ticket->status }}</p>
                                                @else
                                                    <p class="text-warning">{{ $ticket->status }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Zatraženi zahtjev:</strong>
                                                {{ $ticket->message }} 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            @endif
                        @endforeach               
                
                    </div>

                    </div>
                </div>
        </div>
    </div>
</x-app-layout>