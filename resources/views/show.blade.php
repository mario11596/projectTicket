<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pojedinosti o kontaktu') }}
        </h2>
    </x-slot>

    <div class="py-12">
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