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
        .page{
            padding: 0;
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
            height: 1300px;
        }

        .aside {
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

        .nav {
            height: 1300px;
            display: block;
            background-color: rgb(23, 36, 48);           
        }
        .posi{
            position: sticky;           
            top:100px;
            
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
            color: blue;
        }
        hr{
            color:white;
        }
    </style>

</head>

<body>

    <div class="container-fluid page">
        <div class="row navbar">
            <ul class="navbar-nav">
                <div align="center">
                    <li>
                        <a href="#">Home</a>
                    </li>
                </div>
            </ul>
        </div>

        <div class="row content">
            <div class="col-md-3 nav">
                <div class="posi">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('create')}}">Create voucher</a>
                        </li>
                        <hr />
                        <li class="nav-item">
                            <a href="{{route('index')}}">List voucher</a>
                        </li>
                        <hr />
                        <li class="nav-item">
                            <a href="{{route('coin_card')}}">User coin</a>
                        </li>
                        <hr />
                        <li class="nav-item">
                            <a href="{{route('product.index')}}">Product coin and discount</a>
                        </li>
                        <hr />
                        <li class="nav-item">
                            <a href="{{route('coin_card')}}">User coin</a>
                        </li>
                        <hr />
                   </ul>  
                </div>          
            </div>

            <div class="col-md-9 content">

                <div class="row aside">
                    @yield('content')
                </div>
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
    </div>
</body>

</html>