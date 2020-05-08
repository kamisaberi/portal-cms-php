<?php
include_once 'Template/Header.php';
?>
<script>

    $(function () {
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                username: {
                    required: true,
                    minlength: 5
                },
                url: {
                    required: true,
                    url: true
                },
                number: {
                    required: true,
                    number: true
                },
                last_name: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                number: {
                    required: "(لطفا شماره تلفن همراه خود را بنویسید)",
                    number: "(لطفا یک شماره تماس معتبر وارد کنید)"
                },
                last_name: {
                    required: "پر کردن این فیلد الزامی ست",
                    minlength: "طول فیلد باید بیشتر از این تعداد باشد"
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
            errorPlacement: function (error, element) {
                $(element)
                        .closest("form")
                        .find("label[for='" + element.attr("id") + "']")
                        .append(error);
            },
            errorElement: "span",
        });


    });
</script>

<script>
    $(document).ready(function () {

        var parentName;

        $('button[data-toggle="modal"]').click(function () {
            parentName = $(this).attr("data-parent-name");
            $('#' + parentName).toggleClass('hidden');
            //alert(parentName);
        });

        $("#myModal").on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
            $(this).find('span.error').empty();
            $(this).find('.form-control').removeClass('error');
            $('#' + parentName).toggleClass('hidden');
            //alert(parentName);
        });

    });
</script>
<?php
include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>

<?php
require_once '../Classes/Project.inc';
?>
<?php
$projects = ProjectController::Fill();
?>

<?php
$chunkedprojects = array_chunk($projects, 2);
foreach ($chunkedprojects as $chunkedproject) {
    ?>
    <div class = "row projects">
        <?php
        foreach ($chunkedproject as $project) {
            ?>
            <div style = "" class = "col-lg-6">
                <div class = "hpanel hgreen animated zoomIn" id = "pnl1">
                    <div class = "panel-body">
                        <span class = "label label-success pull-left">جدید</span>
                        <div class = "row">
                            <div style = "" class = "col-sm-8">
                                <h4><a href = ""><?php echo $project->ProjectName;  ?></a></h4>
                                <p class = "justify m-line-height"><?php echo $project->Description ; ?> </p>
                                <div class = "row">
                                    <div style = "" class = "col-sm-3">
                                        <div class = "project-label">مشتری</div>
                                        <small>افرا نت</small>
                                    </div>
                                    <div style = "" class = "col-sm-3">
                                        <div class = "project-label">نسخه</div>
                                        <small>1.5.2</small>
                                    </div>
                                    <div style = "" class = "col-sm-3">
                                        <div class = "project-label">فرجه</div>
                                        <small>1394-12-10</small>
                                    </div>
                                    <div style = "" class = "col-sm-3">
                                        <div class = "project-label">پیشرفت</div>
                                        <div class = "progress m-t-xs full progress-small">
                                            <div style = "width: 12%" aria-valuemax = "100" aria-valuemin = "0" aria-valuenow = "12" role = "progressbar" class = " progress-bar progress-bar-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style = "" class = "col-sm-4 project-info">
                                <div class = "project-action m-t-md">
                                    <div class = "btn-group" data-toggle = "buttons">
                                    <!--<button class = "btn btn-xs btn-info btn-lg"> <i class = "fa fa-edit"></i></button>
                                    <button class = "btn btn-xs btn-danger btn-lg"> <i class = "fa fa-eraser"></i></button>
                                    <button class = "btn btn-xs btn-success btn-lg"> <i class = "fa fa-eye"></i></button> -->
                                        <button class = "btn btn-xs btn-default btn-outline"> مشاهده</button>
                                        <button onclick="window.location='Project.php?id=<?php echo $project->ProjectId; ?>';" class = "btn btn-xs btn-default btn-outline" data-parent-name = "pnl1" > ویرایش</button>
<!--                                        <button onclick="window.location='Project.php?id=<?php echo $project->ProjectId; ?>';" class = "btn btn-xs btn-default btn-outline" data-parent-name = "pnl1" data-toggle = "modal" data-target = "#myModal"> ویرایش</button>-->
                                        <button class = "btn btn-xs btn-default btn-outline"> حذف</button>
                                    </div>
                                </div>
                                <div class = "project-value m-t-md">
                                    <h2 class = "text-success">
                                        <?php echo number_format(5000000)  . "  ". "تومان" ; ?>
                                    </h2>
                                </div>
                                <div class = "project-people m-t-lg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a1.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a2.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a3.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a4.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a5.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a6.jpg">
                                    <img alt = "logo" class = "img-circle" src = "Template/images/a7.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "panel-footer">
                        . . .
                    </div>
                </div>
            </div>


            <?php
        }
        ?>
    </div>
    <?php
}
?>


<div class = "row projects">
    <div class = "modal animated fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true" data-backdrop = "static" data-keyboard = "true">
        <div class = "modal-dialog modal-lg">
            <div class = "modal-content">
                <div class = "color-line"></div>
                <div class = "modal-header text-center">
                    <h4 class = "modal-title">ویرایش اطلاعات</h4>

                </div>
                <form novalidate = "novalidate" role = "form" id = "form">
                    <div class = "modal-body">
                        <div class = "form-group"><label for = "name">نام : </label> <input aria-required = "true" id = "name" name = "name" placeholder = "نام خود را بنویسید " class = "form-control" required = "" type = "text"></div>
                        <div class = "form-group"><label for = "last_name">نام خانوادگی : </label> <input id = "last_name" placeholder = "نام خانوادگی خود را بنویسید" class = "form-control" name = "last_name" type = "text"></div>
                        <div class = "form-group"><label for = "url">وب سایت رسمی : </label> <input id = "url" placeholder = "www.example.com" class = "form-control" name = "url" type = "text"></div>
                        <div class = "form-group"><label for = "number">شماره تلفن همراه : </label> <input id = "number" placeholder = "09xx xxx xxxx" class = "form-control" name = "number" type = "text"></div>
                        <div class = "form-group"><label for = "username">نام کاربری : </label> <input id = "username" placeholder = "نام کاربری " class = "form-control" name = "username" type = "text"></div>

                    </div>
                    <div class = "modal-footer">
                        <button type = "submit" class = "btn btn-primary btn-sm">ذخیره</button>
                        <button type = "button" class = "btn btn-default btn-sm" data-dismiss = "modal">بستن</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!--<main class = "container-fluid fixed-nav-offset">
    <div class = "row">
        <div class = "col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class = "panel panel-fav">
                <div class = "panel-heading">
                    <span class = "	glyphicon glyphicon-inbox"></span> &nbsp;
                    مشاهده لیست پروژه ها
                </div>
                <div class = "panel-body no-padding">
                    <div class = "table-responsive">
                        <table class = "table table-hover table-striped no-margin">
                            <thead>
                                <tr class = "fav">
                                    <th>ردیف</th>
                                    <th>عنوان پروژه</th>
                                    <th>توضیحات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                    <th>مشاهده اطلاعات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($projects as $key => $project) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $project->ProjectName; ?></td>
                                        <td><?php echo $project->Description; ?></td>
                                        <td><a href="Project.php?id=<?php echo $project->ProjectId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateProject.php?id=<?php echo $project->ProjectId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a></td>
                                        <td><a href="ProjectDashboard.php?id=<?php echo $project->ProjectId; ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span> مشاهده اطلاعات</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Project.php"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
                                    افزودن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>-->

<?php
include_once 'Template/LeftSideBar.php';
include_once 'Template/Footer.php';
?>