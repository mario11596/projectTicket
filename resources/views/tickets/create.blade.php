<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Novi zahtjev') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-red-100">
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


                <form action="{{ route('ticketStore') }}" method="POST" >
                 @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Kategorija:</strong>
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Vrsta zahtjeva: </option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Prioritet zahtjeva:</strong>
                                <select id="priority" type="" class="form-control" name="priority">
                                  <option value="">Vrsta prioriteta</option>
                                    <option value="nije_hitno">Nije hitno</option>
                                  <option value="moze_pricekati">Može pričekati</option>
                                  <option value="pozuriti">Požurit</option>
                                  <option value="hitno">Hitno</option>
                                </select>
                        </div>
                    </div>
                </div>
                 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Naslov:</strong>
                            <input type="text" name="title" class="form-control" placeholder="naslov">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                            <strong>Korisnik:</strong>
                            <input type="text" name="nameContact" class="form-control" value="{{ $name ?? ' ' }}">
                        </div>
                    </div>
                </div>

                

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Tekst poruke:</strong>
                        <textarea type="text" name="message"  class="form-control" placeholder="tekst poruke"></textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Spremi</button>
                </div>

                </div>
                </form>           
              </div>
            </div>
        </div>
    </div>
</x-app-layout>