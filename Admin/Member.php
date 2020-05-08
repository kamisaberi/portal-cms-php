<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';          ?>

<?php
require_once '../Classes/Member.inc';
require_once '../Classes/Functions.inc';
?>
<?php
$member = new Member();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $member = MemberController::FindOneMember($_GET['id']);
    $cm = 'edit';
}
?>
<?php
echo "<hr>";
?>
<script type="text/javascript">
    function validate() {
        var filevalue = document.getElementById("file").value;
        if (filevalue == "" || filevalue.length < 1) {
            alert("Select File.");
            document.getElementById("file").focus();
            return false;
        }
        return true;
    }
</script> 
<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form class="form-horizontal" action="OperateMember.php" method="POST" enctype="multipart/form-data" onSubmit="//return validate()">

            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='MemberId' name='MemberId' value='$member->MemberId' />" : ''; ?>

            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف کاربر جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="FirstName">
                                    نام :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="نام را وارد کنید" value="<?php echo $cm == 'edit' ? $member->FirstName : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="LastName">
                                    نام خانوادگی :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="نام خانوادگی را وارد کنید" value="<?php echo $cm == 'edit' ? $member->LastName : '' ?>"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3">
                                    جنسیت :
                                </label>
                                <div class="col-sm-9" style="padding-right:50px;">


                                    <div class="radio-inline">
                                        <label><input type="radio" name="Sex" value="مرد" <?php echo $member->Sex == 'مرد' ? 'checked' : '' ?> >مرد</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="Sex" value="زن" <?php echo $member->Sex == 'زن' ? 'checked' : '' ?>>زن</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="BirthDate">
                                    تاریخ تولد :
                                </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="BirthDate"  id="BirthDate" placeholder=" تاریخ تولد خود را وارد کنید" value="<?php echo $cm == 'edit' ? $member->BirthDate : '' ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="MelliCode">
                                    کد ملی :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MelliCode" name="MelliCode" placeholder="کد ملی را وارد کنید" value="<?php echo $cm == 'edit' ? $member->MelliCode : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="MobileNummber">
                                    شماره تلفن همراه :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MobileNummber" name="MobileNummber" placeholder="شماره تلفن همراه را وارد کنید"  value="<?php echo $cm == 'edit' ? $member->Mobile : '' ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Email">
                                    پست الکترونیکی :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Email" name="Email" placeholder="آدرس پست الکترونیکی خود  را وارد کنید"  value="<?php echo $cm == 'edit' ? $member->Email : '' ?>"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Username">
                                    نام کاربری:
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Username" name="Username" placeholder="نام کاربری خود  را وارد کنید"  value="<?php echo $cm == 'edit' ? $member->Username : '' ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Password">
                                    رمز عبور:
                                </label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="رمز عبور خود  را وارد کنید"  value="<?php echo $cm == 'edit' ? $member->Password : '' ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="TPassword">
                                    تکرار رمز عبور:
                                </label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="TPassword" name="TPassword" placeholder="رمز عبور  خود  را دوباره  وارد کنید"  value="<?php echo $cm == 'edit' ? $member->Password : '' ?>"/>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Address">
                                    نشانی :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="Address" name="Address" placeholder="نشانی را وارد کنید"><?php echo $cm == 'edit' ? $member->Address : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class="col-sm-offset-3 col-sm-9 left-align">
                                <input type="submit" name="InsertMember" value="ذخیره" class="btn btn-dark-orange" />
                                <a class="btn btn-light-orange" href="#" onclick="history.back();">
                                    <span class="glyphicon glyphicon glyphicon-remove-sign"></span>
                                    انصراف
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once 'Template/buttom.php'; ?>



