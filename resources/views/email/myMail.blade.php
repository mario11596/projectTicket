<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda o primljenom zahtjevu</title>
</head>
<body>
    <p>Zahtjev za Vašeg korisnika {{ $ticket->contact->name}} je uspješno primljen te će se obraditi u najkraćem roku</p>
    <p>Podaci:</p>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naslov zahtjeva:</strong>
                        {{ $ticket->title }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ime i prezime korisnika:</strong>
                        {{ $ticket->contact->name}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>E-mail adresa:</strong>
                        {{ $ticket->contact->email}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Razina prioriteta:</strong>
                        {{ $ticket->priority }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status zahtjeva:</strong>
                        {{ $ticket->status }} 
                    </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zatraženi zahtjev:</strong>
                        {{ $ticket->message }}  
                </div>
            </div>
        </div>
</body>
</html>
         
