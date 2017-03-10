<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>

        <?php
        if (!class_exists('lessc')) {
            include ('../libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('../less/type-14.less', '../css/type-14.css');
        ?>
        <link href="../css/nivo-slider.css" rel="stylesheet" type="text/css"/>
        <link href="../css/type-14.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="type-14">
            <div class="container">
                <div class="title">
                    <h1>ALBUM HINH MOI</h1>
                </div>
                <div class="menu-category">
                    <ul>
                        <li class="current"><a class="hovers_effect" href="/thu-vien.html" title="Hình ?nh"><span class="hovers_text">Hinh Anh</span></a></li><li><a class="hovers_effect" href="/video.html" title="Video"><span class="hovers_text">Video</span></a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-14/1.jpg" alt=""/>
                        </div>
                        <div class="chu">
                            <h2>Tat Nien 2014</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="hinh">
                            <img src="../images/type-14/2.jpg" alt=""/>
                        </div>
                        <div class="chu">
                            <h2>Mui Ne)</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="hinh">
                            <img src="../images/type-14/3.png" alt=""/>
                        </div>
                        <div class="chu">
                            <h2>Tat Nien 2015</h2>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="hinh">
                            <img src="../images/type-14/4.jpg" alt=""/>
                        </div>
                        <div class="chu">
                            <h2>Trung thu</h2>
                        </div>
                    </div>



                </div>   
            </div>
    </body>
</html>
