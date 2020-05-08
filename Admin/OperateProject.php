<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/Project.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $project = new Project();
        $project->ProjectId = $_POST['ProjectId'];
        $project->ProjectName = $_POST['ProjectName'];
        $project->Description = $_POST['Description'];
        $project->Parent = $_POST['Parent'];
        ProjectController::Insert($project);
        redirectTo("Projects.php");
    } elseif ($_POST['cm'] == 'edit') {
        $project = new Project();
        $project->ProjectId = $_POST['ProjectId'];
        $project->ProjectName = $_POST['ProjectName'];
        $project->Description = $_POST['Description'];
        $project->Parent = $_POST['Parent'];
        ProjectController::Update($project);
        
        redirectTo("Projects.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $project = new Project();
        $project->ProjectId = $_GET['id'];
        ProjectController::Delete($project);
        redirectTo("Projects.php");
    }
}

