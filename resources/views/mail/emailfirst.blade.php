<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>X</title>
</head>
<body>
    <h1>Email Iscrizione, Levap CSM </h1>
    <p>Nome e Cognome: {{ $data['name'] }}</p>
    <br>
    <p>Numero di persone del team: {{ $data['corso'] }}</p>
    <br>
    <p>Motivazione: {{ $data['bodyMessage'] }} </p>
    <br>
    <p>Email di contatto: {{ $data['email'] }}</p>
    <br>
   <strong> <p>IP: {{ $data['ip_address'] }}</p></strong>
</body>
</html>