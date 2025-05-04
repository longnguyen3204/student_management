<?php
$BASE_URL = '/student_management';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (isset($title)) echo $title; ?></title>

    <!-- Bootstrap 3 + Font Awesome 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Sidebar CSS -->
    <style>
        body {
            background: #f4f3ef;
        }

        #wrapper {
            padding-left: 0;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 250px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            left: 250px;
            width: 0;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: #fff;
            transition: all 0.5s ease;
            box-shadow: inset -1px 0px 0px 0px #DDDDDD;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            width: 100%;
            position: absolute;
            padding: 15px;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-right: -250px;
        }

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
            padding: 18px 20px;
            border-bottom: 1px solid rgba(102, 97, 91, 0.3);
        }

        .navbar-default {
            background-color: #f4f3ef;
            border: 0;
            border-bottom: 1px solid #DDDDDD;
        }

        .btn-menu {
            border-radius: 3px;
            padding: 4px 12px;
            margin: 14px 5px 5px 20px;
            font-size: 14px;
            float: left;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 250px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 0;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
            }

            #wrapper.toggled #page-content-wrapper {
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#" style="font-size: 14px;">Trường Đại học Thăng Long</a>
            </li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/home-code.php">Trang chủ</a></li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/noti-manage-code.php">Quản lý thông báo</a></li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/student-manage-code.php">Quản lý học sinh</a></li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/teacher-manage-code.php">Quản lý giáo viên</a></li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/course-manage-code.php">Quản lý môn học</a></li>
            <li><a href="<?=$BASE_URL?>/controllers/admin-crud/grade-manage-code.php">Quản lý điểm</a></li>

            <?php if (!isset($_SESSION['authenticated'])): ?>
                <li><a href="<?=$BASE_URL?>/index.php">Đăng nhập</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['authenticated'])): ?>
                <li><a href="<?=$BASE_URL?>/controllers/auth/signout-code.php">Đăng xuất</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="btn-menu btn btn-success btn-toggle-menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>

        <!-- Main output content -->
        <main><?=$output?></main>
    </div>
</div>

<!-- JS dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Sidebar toggle script -->
<script>
    $(function () {
        $(".btn-toggle-menu").click(function () {
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
</body>
</html>
