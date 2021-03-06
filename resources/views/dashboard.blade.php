<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<x-app-layout >

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Upravljačka ploča') }} -> {{ Auth::user()->name }}
        </h2>

        <div class="flex justify-end ">
            
            <a href="https://mailtrap.io/">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16" >
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
            </svg>
            </a>

            <a class="px-2">
                @if(auth()->user()->unreadnotifications->count())
                    <a href="{{ route('notifications.notificationIndex') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red" class="bi bi-bell-fill" viewBox="0 0 16 16">  
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                    </svg>
                    <span class="badge bg-danger animate-pulse">{{ auth()->user()->unreadnotifications->count() }}</span></a>
                   
                @else
                    <a href="{{ route('notifications.notificationIndex') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                    </svg></a>
                @endif

            </a>
        </div>

    </x-slot>
    
    <div class="py-10 bg-gray-200" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="row ">
            <div class="col-sm-6 ">
                <div class="card p-3 mb-2 border-double border-4 rounded-lg bg-yellow-100">
                    <div class="card-body ">
                        <h5 class="card-title fs-3 fw-bolder text-decoration-underline">Kontakti</h5>
                        <p class="card-text">Ukupan broj kontakata: {{ $data['sumContactsAll'] }} </p>
                        <p class="card-text">Trenutan broj Vaših kontakta: {{ $data['sumContacts'] }} </p> 
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card p-2 mb-2 border-double border-4 rounded-lg bg-yellow-100">
                    <div class="card-body">
                        <h5 class="card-title fs-3 fw-bolder text-decoration-underline">Zahtjevi</h5>
                        <p class="card-text">Trenutan broj zahtjeva:  {{ $data['sumTickets'] }}</p>
                        <p class="card-text text-danger">Trenutan broj otvorenih zahtjeva:  {{ $data['openTickets'] }} </p>
                        <p class="card-text text-success">Trenutan broj zatvorenih zahtjeva:  {{ $data['closeTickets'] }}</p>   
                    </div>
                </div>
            </div>
        </div>    
        <div class="py-12"> 
        <section class="bg-white dark:bg-gray-800 rounded-lg">
        <div class="container px-6 py-8 mx-auto ">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-3 mb-2 bg-info text-dark rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people animate-bounce" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
    
                    <h1 class="mt-4 text-xl text-center font-semibold text-gray-800 dark:text-white ">Ukupan postotak Vaših kontakata</h1>
    
                    <p class="mt-2 text-black text-center font-bold fs-5">{{ round(((float)$data['sumContacts'] / (float)$data['sumContactsAll'] * 100),2 )}} %</p>
                </div>
    
                <div class="p-3 mb-2 bg-danger text-white rounded-lg ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard-x animate-bounce" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>    
    
                    <h1 class="mt-4 text-xl text-center font-semibold text-gray-800 dark:text-white">Postotak otvorenih zahtjeva</h1>
                    @if($data['sumTickets'] != 0)
                        <p class="mt-2 text-black text-center font-bold fs-5">{{ round(((float)$data['openTickets'] / (float)$data['sumTickets'] * 100),2 )}} %</p>
                    @elseif($data['sumTickets'] == 0)
                        <p class="mt-2 text-black text-center font-bold fs-5"> 0 %</p>
                    @endif
                </div>
                
                <div class="p-3 mb-2 bg-success text-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard-check animate-bounce" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                
                    <h1 class="mt-4 text-xl text-center font-semibold text-gray-800 dark:text-white">Postotak obrađenih zahtjeva</h1>
                    @if($data['sumTickets'] != 0)
                        <p class="mt-2 text-black text-center font-bold fs-5">{{ round(((float)$data['closeTickets'] / (float)$data['sumTickets'] * 100),2 )}} %</p>
                    @elseif($data['sumTickets'] == 0)
                        <p class="mt-2 text-black text-center font-bold fs-5"> 0 %</p>
                    @endif
                </div>
            </div>
        </div>
        </section>
        </div>
    
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="piechart_3d" style="width: 1000px; height: 500px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8""></div>
            <script type="text/javascript">
            var proposalTicket = <?php echo json_encode($data['proposalTicket']); ?>;
            var complaintTicket = <?php echo json_encode($data['complaintTicket']); ?>;
            var complaintHardTicket = <?php echo json_encode($data['complaintHardTicket']); ?>;

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count from Sum'],
                ['Pritužba', complaintTicket],
                ['Prijedlog', proposalTicket],
                ['Žalba', complaintHardTicket]
            ]);

            var options = {
                title: 'Pregled zahtjeva po kategorijama',
                is3D: true,
                titleTextStyle: {
                    fontSize: 19,
                    italic: true
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

            chart.draw(data, options);
            }
        </script>
        <div class="py-12 "> 
            <footer class="px-6 py-2 bg-white text-black text-center rounded-lg">
                <p class="py-2 text-gray-800 dark:text-white sm:py-0">@All rights reserved by Tvrtka d.o.o</p>
            </footer>
        </div>
        </div>
    </div>          
</x-app-layout>
