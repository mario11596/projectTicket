 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Svi kontakti') }}
        </h2>
    </x-slot> 
    <div class="py-20">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href="{{ route('create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj novog</a>
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-bordered table-responsive-lg">
                <tr>
                    <th>Ime</th>
                    <th>Godine</th>
                    <th>Adresa</th>
                    <th>Broj mobitela</th>
                    <th>Mail adresa</th>
                    <th>Stanje tekučeg računa</th>
                    <th>Kredit</th>
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
                            <a href="{{ route('edit', $contact->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Uredi</a>
                            <a href="{{ route('destory', $contact->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Obriši</a>         
                        </td>
                    </tr>                          
                    @endforeach
                </table>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
