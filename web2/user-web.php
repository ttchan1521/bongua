<?php 
    session_start();
    include('connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FirstScreen</title>
    <!-- Import Boostrap css, js, font awesome here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="style_userpage.css" rel="stylesheet">
    <style>
        .card-body .btn {
            font-weight: 300;
            padding: .300rem .60rem;
            font-size: 0.8rem;
            line-height: 1.2;
            border-radius: .25rem;
        }
        #user {
            display: inline-block;
            color: white;
        }
        #user i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-branch" href="#">
            <h1 height="50" >Your Timeline</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services </a>
                </li>
                <!-- chèn tên người dùng-->
                <li class="nav-item" id="user">
                    <i class="fas fa-user"></i> 
                </li>
                <li id="user">
                    <?php 
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM users WHERE userID = $id";
                        $res = mysqli_query($con, $sql);
                        if ($res) {
                            while($row = mysqli_fetch_assoc($res))
                            {
                                 $name = $row['firstName'];
                                    ?>                 
                                    <h5> <?php echo $name; ?> </h5>
                            <?php
                            }
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="add">
    <?php
        $id = $_GET['id']; 
    ?>
    <a href="add_timeline.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary" onclick="">Add new timeline</a>
</div>


<div class="left-menu">
    <h1 class="display-4 my-4 text-info">Your list timeline</h1>

    <div id="timelines_filter" class="dataTables_filter">
        <label>
            Search:
            <input type="search" class placeholder aria-controls="timelines">
        </label>
    </div>

    <div class="dataTables_length" id="timelines_length">
        <label>
            Show
            <select name="timelines_length" aria-controls="timelines" class>
                <option value="8">8</option>
                <option value="15">15</option>
                <option value="25">25</option>
            </select>
            entries
        </label>
    </div>

    <table class="table table-striped" id="users" style="width: 100%;">
        <thead >
        <tr id="list-header">
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" id="btnReloadData">Reload data</button>
</div>

<div class="container-fluid padding" style="min-height: 300px">
    <div class="row padding">

        <?php 
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM timelines WHERE userID = $id";

            $res = mysqli_query($con, $sql);

            if ($res) {
                $count = mysqli_num_rows($res);

                if ($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $name = $row['universesName'];
                        $tml = $row['universeID'];
                        ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="./images/image.jpg">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $name; ?></h4>
                                        <a href="rename_timeline.php?id=<?php echo $id; ?>&tml=<?php echo $tml; ?>&tmlName=<?php echo $name; ?>" class="btn btn-outline-secondary">Rename</a>
                                        <a href="delete_timeline.php?id=<?php echo $id; ?>&tml=<?php echo $tml; ?>" class="btn btn-outline-secondary">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                else 
                {
                    echo "Bạn chưa tạo Timeline";
                }
            }
            else 
            {
                echo "Có lỗi xảy ra trong quá trình thực hiện";
            }
        
        ?>
        
    </div>
</div>

    <?php
        include 'footer.php';
    ?>

</body>
</html>