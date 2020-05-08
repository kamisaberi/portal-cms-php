<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>

<?php
require_once 'Classes/Member.inc';
$member = MemberController::FindOneMember($_SESSION['memberId']);
?>


<?php require_once 'Template/Header.php' ?>
<!-- Toastr style -->
<!--<link href="Template/css/plugins/toastr/toastr.min.css" rel="stylesheet">-->


</head>

<body class="md-skin rtls fixed-nav fixed-sidebar boxed-layout mini-navbar">

<div id="wrapper">

    <?php require_once 'Template/SideBarMenu.php' ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom ">
            <?php require_once 'Template/TopMenu.php' ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
<!--                --><?php //$_GET['navid']=3; ?>
                <?php MemberUIBuilder::CreateOneMemberHorizontalHeaderWidget($_SESSION['memberId'],3) ?>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    1,200
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                   4,500
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box active">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    5,400
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    54,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    60,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    88,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    120,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    50,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    10,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    40,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    45,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ توضیحات محصول ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    21,000
                                </span>
                                <small class="text-muted">دسته بندی</small>
                                <a href="ecommerce_products_grid.html#" class="product-name"> محصول</a>


                                <div class="small m-t-xs">
                                    توضیحات نرم افزار های دسکتاپ و وب
                                </div>
                                <div class="m-t text-left">

                                    <a href="ecommerce_products_grid.html#" class="btn btn-xs btn-outline btn-primary">اطلاعات
                                        <i class="fa fa-long-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <?php require_once 'Template/Footer.php' ?>
    </div>
</div>



<?php require_once 'Template/Scripts.php' ?>

</body>

</html>
