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
        $less->compileFile('../less/type-15.less', '../css/type-15.css');
        ?>
        <link href="../css/nivo-slider.css" rel="stylesheet" type="text/css"/>
        <link href="../css/type-15.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="type-15">
            <div class="container">
                <div class="title">
                    <h1>TIN TUC</h1>
                </div>
                <div class="menu-category">
                    <ul>
                        <li class="current">
                            <a class="hovers_effect" href="#" title="TinTuc&SuKien">
                                <span class="hovers_text">TinTuc&SuKien</span>
                            </a>
                        </li>
                        <li>
                            <a class="hovers_effect" href="#" title="TIn chuyen nghanh="hovers_text">Tin Chuyen Nganh</span>

                            </a>
                        </li>
                          <li>
                            <a class="hovers_effect" href="#" title="TIn khuyen mai="hovers_text">Tin khuyen mai</span>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-15/1.jpg" alt=""/>
                        </div>
                        <div class="tieude">
                            <a href="#">10 nam chan nuoi Viet Nam phat trien va hoi nhap</a>
                        </div>
                        <div class="noidung">
                            Là lĩnh vực chủ chốt trong SX nông nghiệp, tuy nhiên phải tới năm 2005, ngành chăn nuôi Việt Nam mới có cơ quan quản lí nhà nước riêng (Cục Chăn nuôi).

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-15/1.jpg" alt=""/>
                        </div>
                        <div class="tieude">
                            <a href="#">10 nam chan nuoi Viet Nam phat trien va hoi nhap</a>
                        </div>
                        <div class="noidung">
                            Là lĩnh vực chủ chốt trong SX nông nghiệp, tuy nhiên phải tới năm 2005, ngành chăn nuôi Việt Nam mới có cơ quan quản lí nhà nước riêng (Cục Chăn nuôi).

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-15/1.jpg" alt=""/>
                        </div>
                        <div class="tieude">
                            <a href="#">10 nam chan nuoi Viet Nam phat trien va hoi nhap</a>
                        </div>
                        <div class="noidung">
                            Là lĩnh vực chủ chốt trong SX nông nghiệp, tuy nhiên phải tới năm 2005, ngành chăn nuôi Việt Nam mới có cơ quan quản lí nhà nước riêng (Cục Chăn nuôi).

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-15/1.jpg" alt=""/>
                        </div>
                        <div class="tieude">
                            <a href="#">10 nam chan nuoi Viet Nam phat trien va hoi nhap</a>
                        </div>
                        <div class="noidung">
                            Là lĩnh vực chủ chốt trong SX nông nghiệp, tuy nhiên phải tới năm 2005, ngành chăn nuôi Việt Nam mới có cơ quan quản lí nhà nước riêng (Cục Chăn nuôi).

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="hinh">
                            <img src="../images/type-15/1.jpg" alt=""/>
                        </div>

                        <div class="noidung">
                            <a href="#">10 nam chan nuoi Viet Nam phat trien va hoi nhap</a>
                            Là lĩnh vực chủ chốt trong SX nông nghiệp, tuy nhiên phải tới năm 2005, ngành chăn nuôi Việt Nam mới có cơ quan quản lí nhà nước riêng (Cục Chăn nuôi).

                        </div>
                    </div>



                </div>   
            </div>
    </body>
</html>
