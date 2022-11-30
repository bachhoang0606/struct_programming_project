<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
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
        .navbar {
            height: 100px;
        }
        .navbar ul {
            list-style-type: none;
            width: 100%;
            top: 0;
            background-color: rgb(23, 36, 48);
            position: fixed;
        }
        .navbar li {
            display: inline-block;
        }
        .navbar li:hover {
            background-color: white;
        }
        .navbar li a:hover {
            color: black;
        }
        .navbar li a {
            color: white;
            font-size: 45px;
            line-height: 100px;
            padding: 0 80px;
            text-decoration: none;
        }
        .content {

            height: 2000px;
        }
        .aside{
            height: 1700px;
        }

        .footer {
            padding: 20px;
            height: 300px;
            background-color: rgb(248, 242, 242);
      
        }
        .footer a {
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
        .nav {
            height: 2000px;
            display: block;
            background-color: rgb(23, 36, 48);
           
        }
        .vertical-menu{
            position: fixed;
        }
        .nav li {
            list-style: none;
            padding: 10px 10px;
            cursor: pointer;
            display: block;
        }
        .nav li a {
            font-size: 35px;
            text-decoration: none;
            color: white;
        }
        .nav li a:hover {
            font-size: 35px;
            color: rgba(75, 105, 176, 1);
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row navbar">
            <ul class="navbar-nav">
                <div align="center">
                    <li>
                        <a href="route('create')">Link 1</a>
                    </li>
                    <li>
                        <a href="route('index')">Link 2</a>
                    </li>
                    <li>
                        <a href="route('poin_card')">Link 3</a>
                    </li>

            </ul>
        </div>

        <div class="row content">
            <div class="col-md-1 nav">
                

                <ul class="vertical-menu">

                    <li><a href="">Schedule</a></li>
                    <hr />
                    <li><a href="">Event</a></li>
                    <hr />
                    <li><a href="">Setting</a></li>
                    <hr />
                    <li><a href="">Privacy</a></li>
                    <hr />
                    <li><a href="">Event</a></li>
                    <hr />
                </ul>
            </div>
            <div class="col-md-7 aside no-padding">
                @yield('content')
                <div class="row aside"></div>
                <div class="row footer">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-3">
                        <h3 class="footer_heading">Ve shop</h3>
                        <ul class="fotter_list">
                            <li><a href="">Gioi thieu</a></li>
                            <li><a href="">Dieu khoan</a></li>
                            <li><a href="">Chinh sach bao mat</a></li>
                        </ul>
                    </div>
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-3">
                        <h3 class="footer_heading">Theo doi chung toi tren</h3>
                        <ul class="fotter_list">
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>