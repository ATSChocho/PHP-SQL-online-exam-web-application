<?php

if (isset($_SESSION['id'])) {

    if ($_SESSION['id'] != "") {
        $id = $_SESSION['id'];
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $email = $_SESSION['mail'];
    }
} else {
    session_start();
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gestion de données</title>
    <meta name="viewport" content="Initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <?php
    if (isset($_SESSION['id'])) { ?>
        <div class="navbar">
            <div class="ui inverted menu">
                <a class="item">Hello <?php echo ($_SESSION['name'] . " " . $_SESSION['surname']); ?></a>
                <a href="index.php?action=homes" class="primairy inverted item ">
                    Home
                </a>
                <?php if (isset($_SESSION['teacher']) == false) { ?>
                    <a href="index.php?action=exam" class="inverted item">
                        Pass the test
                    </a>
                    <a href="index.php?action=table_grades" class="item">
                        Grades
                    </a>
                <?php } else { ?>
                    <a href="index.php?action=student" class="inverted item">
                        Students
                    </a>
                <?php } ?>
                <div class="right menu">
                    <div class="item">
                        <?php
                        if (!empty($_SESSION['id'])) { ?>
                            <a class="ui inverted red button" href="index.php?action=logout">
                                Logout
                            </a>
                        <?php } ?>
                    </div>
                </div>s
            </div>
        </div>
</head>

<body>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>