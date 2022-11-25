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
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html{
            font-family: Arial, Helvetica, sans-serif;
        }
        .header{
            height: 70px;
            background-color:blue;
            text-align: center;
        }
        #nav li{
            display: inline-block;      
        }

        #nav li:hover {
            color: white;
            background-color: #333;
        }
        #nav li a{
            color: white;
            font-size: 30px;
            line-height: 70px;
            padding: 0 80px;
            text-decoration: none;
        
        }
        .content{
            height: 800px;
        }
        .section{
            background-color: #333;
            height: 800px;
        }
        .aside{
            background-color: red;
            height: 800px;
        }
        
        .footer{
            padding: 20px;
            height: 300px;
            background-color: #222;
        }
    </style>

 
</head>
<body>
    
    <div class="container bg-info">
        <!-- <h1 >Heare is the layout</h1>
        <p>here is some thing dis play nav, section, ....</p> -->
        <div class = "header">    
            <ul id = "nav" >
                <li><a href=""> Home </a></li>
                <li><a href=""> B </a></li>
                <li><a href=""> C </a></li>
                <li><a href=""> D </a></li>
            </ul>
        </div>

        <div class="row content">
            <div class = "col-md-7 ">
                <div class ="row section">

                </div>
               

            </div>
            <div class = "col-md-5 aside">
                    @yield('content')

            </div>
        </div>

        <div class="row footer">

            <div class = "col-md-4">
                <h3 class = "footer_heading">Cham soc khach hang</h3>
                <ul class = "fotter_list">
                   <li><a href="">Trung tam tro giup</a></li>
                   <li><a href="">Huong dan mua hang</a></li>
                </ul>
            </div>

            <div class = "col-md-4">
            <h3 class = "footer_heading">Theo doi chung toi tren</h3>
                <ul class = "fotter_list">
                   <li><a href="">Facebook</a></li>
                   <li><a href="">Instagram</a></li>
                </ul>
            </div>

            <div class = "col-md-4">
            <h3 class = "footer_heading">Cham soc khach hang</h3>
                <ul class = "fotter_list">
                   <li><a href="">Trung tam tro giup</a></li>
                   <li><a href="">Huong dan mua hang</a></li>
                </ul>
            </div>

        </div>
    </div>

    
    <hr>
    <div class="container bg-warning">

        @yield('content')
    </div>
    
<hr>
</body>
</html>