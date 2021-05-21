@component('mail::message')
    <strong>Hvala Vam {{ $ticket->contact->name }} što koristite naše usluge.
        Vaš zahtjev je uspješno obrađen te ćete u najkraćem roku dobiti povratnu informaciju</strong>

    Vaša Banka, {{$ticket->user->name}}
@endcomponent