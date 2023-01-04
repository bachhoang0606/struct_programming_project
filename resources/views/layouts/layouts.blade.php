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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS RTL-->
    <link href="css/bootstrap-rtl.min.css" rel="stylesheet">

    <title>Document</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #287bff;
            --white: #fff;
            --grey: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .navigation {
            height: 100%;
            background-color: var(--blue);
            /* border-left: 10px solid var(--blue); */
            transition: 0.5s;
            overflow: hidden;

            top: 0;
            left: 0;
            padding: 0;
        }

        .navigation {
            position: sticky;
            top:0;
        }
        .navigation ul{
            padding: 0;
            
        }

        .navigation ul li {
          
            list-style: none;

        }

        .navigation ul li:hover {
            background-color: var(--white);

        }

        .navigation ul li:nth-child(1) {
            margin-bottom: 100px;

        }

        .navigation ul li a {
            display: block;
            /* width: 100%; */
            display: flex;
            text-decoration: none;
            color: var(--white);
        }

        .navigation ul li:hover a {
            color: var(--blue);
        }

        .navigation ul li a .icon {

            display: block;
            min-width: 80px;
            height: 80px;
            line-height: 60px;
            text-align: center;
            padding-top: 20px;

        }

        .navigation ul li a .icon ion-icon {
            font-size: 2em;
        }

        .navigation ul li a .title {

            display: block;
            padding: 0 10px;
            height: 80px;
            line-height: 80px;
            text-align: start;
            white-space: nowrap;
            font-size: 25px;
            font-weight: 400;
        }

        .main {
            padding: 90px;
        }
    </style>

</head>

<body>

    <div class="container-fluid page">

        <div class="row content">
            <div class="col-md-3 navigation">

                <ul>
                    <li><a href="#">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>

                    <li><a href="{{route('dashbroad')}}">
                            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('create')}}">
                            <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
                            <span class="title">Create Voucher</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('index')}}">
                            <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                            <span class="title">List Voucher</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('coin_card')}}">
                            <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                            <span class="title">User coin</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('product.index')}}">
                            <span class="icon"><ion-icon name="calculator-outline"></ion-icon></ion-icon></span>
                            <span class="title">Product coin and discount</span>
                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-md-9 main">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>