<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Svi kontakti') }}
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
                <div class="input-group">
                    <form action="{{ route('search') }}" method="GET" role="search">
                        <input type="text" name="search" required/>
                        <button type="submit">Pretraži</button>
                    </form>
                </div>
            
             <a href="{{ route('create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj novog</a>
             


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-bordered table-responsive-lg table table-stripe">
                <tr>
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
                        <th>{{ $contact->credit}} kn</th>
                        <td>
                        <a href="{{ route('edit', $contact->id) }}" class="btn btn-info">Uredi</a>
                        </td>
                        <td>
                        <a href="{{ route('destory', $contact->id) }}" class="btn btn-danger">Obriši</a>         
                        </td>
                        <td>
                        <a href="{{ route('show', $contact->id) }}" class="btn btn-success">Prikaži</a>         
                        </td>
                        <td>
                        <a href="{{ route('ticket_create_user', $contact->name) }}" class="btn btn-secondary">Zahtjev</a>         
                        </td>
                    </tr>                          
                    @endforeach
                </table>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
