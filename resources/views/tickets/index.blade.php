<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Svi zahtjevi') }}
        </h2>
    </x-slot> 
    <div class="py-20">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('info'))
                    <div class="alert alert-info">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif

            <nav class="flex flex-row">
                <div class="input-group">
                    <form action="{{ route('ticketSearch') }}" method="GET" role="search">
                        <input type="text" name="search" required/>
                        <button type="submit">Pretraži</button>
                    </form>
                </div>

            
             <a href="{{ route('ticketCreate') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Otvori novi zahtjev</a>
            </nav>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-bordered table-responsive-lg table table-stripe">
                <tr>
                    <th>Naslov zahtjeva</th>
                    <th>Korisnik</th>
                    <th>E-mail adresa</th>
                    <th>Prioritet</th>
                    <th>Vrsta zahtjeva</th>
                    <th>Status zahtjeva</th>
                    <th>Otvori / Zatvori</th>
                    

                </tr>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->title }}</td>
                        <td>{{  $ticket->contact->name}} </td>
                        <td>{{ $ticket->contact->email}}</td>
                        <td>{{ $ticket->priority }}</td>
                        <td>{{ $ticket->category->name }}</td>
                        <td>
                        @if($ticket->status == 'Otvoreno')
                            <p class="text-success ">{{ $ticket->status }}</p>
                        </td>
                        @else
                         <p class="text-warning">{{ $ticket->status }}</p>
                         @endif
                         </td>

                        @if($ticket->status == 'Otvoreno')
                            <td>
                            <a href="{{ route('ticketClose', $ticket->id) }}" class="btn btn-warning">Zatvori zahtjev</a>
                            </td>          
                        @else 
                            <td>
                            <a href="{{ route('ticketOpen', $ticket->id) }}" class="btn btn-success">Otvori zahtjev</a>
                            </td>                        
                        @endif 

                        <td>
                        <a href="{{ route('ticketDestroy', $ticket->id) }}" class="btn btn-danger">Obriši</a>         
                        </td>
                        <td>
                        <a href="{{ route('ticketShow', $ticket->id) }}" class="btn btn-success">Prikaži</a>         
                        </td>                    
                    </tr>                        
                    @endforeach
                </table> 
                    {{isset($search)? $tickets->appends(['search'=> $search])->links() : $tickets->links()}}       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
