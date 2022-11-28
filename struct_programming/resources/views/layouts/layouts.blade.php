<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .center {
            margin: auto;
            width: 30%;
            border: 3px solid white;
            padding: 10px; 
        }
    </style>
</head>
<body>
    <div class="container bg-info">
        <h1 >Heare is the layout</h1>
        <p>here is some thing dis play nav, section, ....</p>
    </div>
    <hr>
    <div class="center">
        @yield('content')
    </div>
    
<hr>
</body>
</html>