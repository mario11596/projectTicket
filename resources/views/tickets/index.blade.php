<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
            </svg>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Svi zahtjevi') }}
            </h2>
        </div>
    </x-slot> 
    <div class="py-10 bg-gray-200" style="height: 86%;">

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
                    <form action="{{ route('tickets.ticketSearch') }}" method="GET" role="search">
                        <input type="text" placeholder="Pretraži..." name="search" required/>
                        <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" type="submit">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                            <button type="button" onClick="window.location.reload();" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                                <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
                                <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
                                </svg>
                            </button>
                    </form>
                </div>

                
                <a href="{{ route('tickets.ticketCreate') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                </svg></a>
            </nav>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-bordered table-responsive-lg table table-stripe">
                        <tr class="bg-yellow-100">
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
                                <a href="{{ route('tickets.ticketClose', $ticket->id) }}" class="btn btn-warning">Zatvori zahtjev</a>
                                </td>          
                            @else 
                                <td>
                                <a href="{{ route('tickets.ticketOpen', $ticket->id) }}" class="btn btn-success">Otvori zahtjev</a>
                                </td>                        
                            @endif 

                            <td>
                            <a href="{{ route('tickets.ticketDestroy', $ticket->id) }}" class="btn btn-danger">Obriši</a>         
                            </td>
                            <td>
                            <a href="{{ route('tickets.ticketShow', $ticket->id) }}" class="btn btn-success">Prikaži</a>         
                            </td>                    
                        </tr>                        
                            @endforeach
                        </table> 
                        {{isset($search)? $tickets->appends(['search'=> $search])->links() : $tickets->links()}}  
                    </div>     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
