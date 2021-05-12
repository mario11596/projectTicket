<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uređivanje zahteva klijena ') }}
            <div> {{ $ticket->contact->name }}</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href="{{ route('ticket_index') }}" class="btn btn-warning">Vrati se natrag</a>
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


                <form action="{{ route('ticket_update', $ticket->id) }}" method="POST" >
                 @csrf
                

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Naslov:</strong>
                            <input type="text" name="title" id="title" value="{{ $ticket->title}}" class="form-control" placeholder="naslov">
                        </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Korisnik:</strong>
                        <input class="form-control" style="height:50px" name="contact_id" id="$ticket->contact->name" type="text" value="{{ $ticket->contact->name}}" placeholder="ime i prezime korisnika"/>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Prioritet:</strong>
                        <input type="text" name="priority" id="priority" value="{{ $ticket->}}" class="form-control" placeholder="prioritet zahtjeva">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Zatraženi zahtjev:</strong>
                        <input type="text" name="message" id="message" value="{{ $ticket->message}}" class="form-control" placeholder="Zatraženi zahtjev korisnika">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Odobri promjenu zahtjeva</button>
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