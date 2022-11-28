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
        * {
            padding: 0;
            margin: 0;
        }

        .row {
            margin: 0;
        }

        html {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            height: 80px;
            position: fixed;
            text-align: center;
            
        }

        .header ul {
            list-style-type: none;
            width: 100%;
            top: 0;
            /* overflow: hidden; */
            background-color: lightgray;
        }

        #nav li {
            display: inline-block;
            border-right: 1px solid blue;
        }

        #nav li:hover {
            color: white;
            background-color: #333;
        }

        #nav li a:hover {
            color: white;
        }

        #nav li a {
            color: black;
            font-size: 40px;
            line-height: 80px;
            padding: 0 80px;
            text-decoration: none;
        }

        .content {
            height: 1000px;
        }

        .footer {
            padding: 20px;
            height: 300px;
            background-color: rgb(248, 242, 242);
        }

        .footer a {
            text-decoration: none;
            color: black;
            font-size: 15px;
        }
    </style>

</head>

<body>

    <div class="container bg-info">
        <div class="row header">
            <ul id="nav">
                <li><a href=""> Home </a></li>
                <li><a href=""> B </a></li>
                <li><a href=""> C </a></li>
                <li><a href=""> D </a></li>

            </ul>
        </div>

        <div class="row content">
            <div class="col-md-5 section">

            </div>
            <div class="col-md-7 aside">
                @yield('content')

            </div>
        </div>

        <div class="row footer">

            <div class="col-md-4">
                <h3 class="footer_heading">Cham soc khach hang</h3>
                <ul class="fotter_list">
                    <li><a href="">Trung tam tro giup</a></li>
                    <li><a href="">Huong dan mua hang</a></li>
                    <li><a href="">Chinh sach bao hanh</a></li>
                    <li><a href="">Thanh toan</a></li>
                    <li><a href="">Van chuyen</a></li>
                    <li><a href="">Cham soc khach hang</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h3 class="footer_heading">Ve shop</h3>
                <ul class="fotter_list">
                    <li><a href="">Gioi thieu</a></li>
                    <li><a href="">Dieu khoan</a></li>
                    <li><a href="">Chinh sach bao mat</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h3 class="footer_heading">Theo doi chung toi tren</h3>
                <ul class="fotter_list">
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--     
    <hr>
    <div class="container bg-warning">
        @yield('content')
    </div>
    
<hr> -->
</body>

</html>