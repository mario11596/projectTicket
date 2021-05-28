<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <div class="input-group ">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Svi kontakti') }} 
            </h2>
        </div>
    </x-slot> 

    <div class="py-10 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
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
                    <form action="{{ route('contacts.search') }}" method="GET" role="search">
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
            
                <a href="{{ route('contacts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg></a>
                </nav>
           
            
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-bordered table-responsive-lg table table-stripe">
                
                        <tr class="bg-yellow-100">
                            <th>Ime i prezime</th>
                            <th>Godine starosti</th>
                            <th>Adresa stanovanja</th>
                            <th>Broj mobilnog telefona</th>
                            <th>E-mail adresa</th>
                            <th>Stanje tekućeg računa</th>
                            <th>Iznos trenutnog kredita</th>
                        </tr>

                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->age }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->mobile }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->currentaccountbalance }} kn</td>
                            <td>{{ $contact->credit}} kn</td>
                            <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-info">Uredi</a>
                            </td>
                            <td>
                            <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-danger">Obriši</a>         
                            </td>
                            <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-success">Prikaži</a>         
                            </td>
                            <td>
                            <a href="{{ route('tickets.ticketCreateUser', $contact->name) }}" class="btn btn-secondary">Zahtjev</a>         
                            </td>
                        </tr>             
                        @endforeach
                        </table>
                    {{isset($search)? $contacts->appends(['search'=> $search])->links() : $contacts->links()}}                
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
