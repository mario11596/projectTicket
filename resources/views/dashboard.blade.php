<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upravljačka ploča') }}
            <div> {{ Auth::user()->name }}</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <ul class="list-group list-group-flush">
                         <li class="list-group-item fw-bold fs-5"> Upravljanje kontakima: </li>

                        <li class="list-group-item">
                        <a class="btn btn-outline-primary " 
                        href="{{ route('index') }}">Svi kontakti</a>
                        </li>

                        <li class="list-group-item">
                        <a class="btn btn-outline-secondary" 
                        href="{{ route('create') }}"> Novi kontakt</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
