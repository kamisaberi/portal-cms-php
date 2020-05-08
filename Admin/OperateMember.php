<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Member.inc'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $member = new Member();
        $member->Address = $_POST['Address'];
        $member->BirthDate = $_POST['BirthDate'];
        $member->FirstName = $_POST['FirstName'];
        $member->LastName = $_POST['LastName'];
        $member->MelliCode = $_POST['MelliCode'];
        
        $member->Email = $_POST['Email'];
        $member->Username = $_POST['Username'];
        $member->Password = $_POST['Password'];
        $member->Mobile = $_POST['MobileNummber'];
        $member->Sex = $_POST['Sex'];
        MemberController::Insert($member);
        redirectTo("Members.php");
    } elseif ($_POST['cm'] == 'edit') {
        $member = new Member();
        $member->Address = $_POST['Address'];
        $member->BirthDate = $_POST['BirthDate'];
        $member->FirstName = $_POST['FirstName'];
        $member->LastName = $_POST['LastName'];
        $member->MelliCode = $_POST['MelliCode'];
        $member->Email = $_POST['Email'];
        $member->Username = $_POST['Username'];
        $member->Password = $_POST['Password'];
        $member->MemberId = $_POST['MemberId'];
        $member->Mobile = $_POST['MobileNummber'];
        $member->Sex = $_POST['Sex'];
        MemberController::Update($member);
        redirectTo("Members.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $member = new Member();
        $member->MemberId = $_GET['id'];
        $found = MemberController::FindOneMember($member->MemberId);
        $ImagePath = $found->ImagePath;
        MemberController::Delete($member);
        unlink("images/" . $ImagePath);
        redirectTo("Members.php");
    }
}

