<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .row{
            margin:0;
        }
        html {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            height: 80px;
            background-color: rgb(248, 129, 18);
            text-align: center;
        }

        #nav li {
            display: inline-block;
        }

        #nav li:hover {
            color: white;
            background-color: #333;
        }

        #nav li a {
            color: white;
            font-size: 40px;
            line-height: 80px;
            padding: 0 80px;
            text-decoration: none;
            /* font-weight: bold; */
        }

        .content {
            height: 800px;
        }

        .section {
            /* background-color: rgb(236, 71, 71); */
            height: 800px;
        }

        button {
            background-color: rgb(236, 71, 71);
            text-align: center;
        }

        .aside {
            background-color: red;
            height: 800px;
        }

        .footer {
            padding: 20px;
            height: 300px;
            background-color: rgb(248, 242, 242);
        }
        .button{
            height: 200px;
            width: 300px;
            border: solid 4px orange;
            margin:100px auto;
            border-radius: 10px;
        }
        .button:hover{
            background-color: #00bfa5;
        }
        .ct{
            color:black;
            margin:80px auto;
            text-align: center;
            display: inline-block;
         
        }
    </style>

</head>

<body>

    <div class="container bg-info">
        <!-- <h1 >Heare is the layout</h1>
        <p>here is some thing dis play nav, section, ....</p> -->
        <div class="header">
            <ul id="nav">
                <li><a href=""> Home </a></li>
                <li><a href=""> B </a></li>
                <li><a href=""> C </a></li>
                <li><a href=""> D </a></li>
            </ul>
        </div>

        <div class="row content">
            <div class="col-md-5 section">
                
                <div class="row ">
                   <div class="button">
                        <a class="ct" href="">Tao voucher moi</a>
                   </div>
                </div>

                <div class="row ">
                   <div class="button">
                        <a class="ct" href="">Tao voucher moi</a>
                   </div>
                </div>


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
    <div class="container-wrap">

        @yield('content')
    </div>
    
<hr> -->
</body>

</html>