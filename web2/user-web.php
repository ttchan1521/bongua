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
        #users a {
            display: block;
            font-size: 23px;
            text-decoration: none;
        }
        .dataTables_filter {
            display: inline;
        }
        .dataTables_filter button i{
            font-size: 16px;
            color: 	#cccccc;
        }
        .dataTables_filter input {
            padding: 0px;
            margin: 0px;
            height: 35px;
            font-size: 20px;
            width: 180px;
            text-indent: 13px;
        }
        .dataTables_filter .btn{
            padding: 0px;
            width: 35px;
            height: 34px;
            /* right: 50px; */
            margin-bottom: 3px;
        }
        .table td, .table th , .table tr{
            padding: .1rem!important;
            font-size: 25px;
            text-indent: 13px;
        }
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 20px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 20px;
        }
  
        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;} 
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;} 
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
    <div id="user">
        <?php 
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE userID = $id";
            $res = mysqli_query($con, $sql);
            if ($res) {
                while($row = mysqli_fetch_assoc($res))
                {
                    $name = $row['firstName'];
                        ?>                 
                        <h5><i class="fas fa-user"></i>  <?php echo $name; ?> </h5>
                <?php
                }
            }
        ?>
    </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="change-password.php?id=<?php echo $id; ?>"><i class="fas fa-unlock-alt"></i>Change pasword</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-sign-out-alt"></i>Logout </a>
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


<div class="left-menu" style="max-height: 300px">
    <h1 class="display-4 my-4 text-info">Your list timeline</h1>

    <?php 
        if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT universesName FROM timelines WHERE universesName LIKE '%$searchKey%' ";
        } else {
            $id = $_GET['id'];
            $sql = "SELECT universesName FROM timelines WHERE userID = $id";
            $searchKey = "";
        }
        $result = mysqli_query($con, $sql);
    ?>
    <div id="timelines_filter" class="dataTables_filter">
        <form action="" method="POST"> 
			<input type="text" name="search" class='form-control' 
                placeholder="Search By Name" value="<?php echo $searchKey; ?>" > 
			<button style="submit" class="btn"><i class="fas fa-search"></i></button>
	    </form>
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

    <table class="table table-striped" id="users" >
        <thead >
            <tr id="list-header">
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><a href=""><?php echo $row->universesName ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- <button type="button" class="btn btn-primary" id="btnReloadData">Reload data</button> -->
</div>

<div class="container-fluid padding" style="min-height: 500px" style="max-height: 200px">
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
                                        <h4 class="card-title"><a href=""><?php echo $name; ?></a></h4>
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
<div id="snackbar">Password changed successfully</div>
<?php
    if (isset($_SESSION['changep'])) {
        ?>
        <script>
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        </script>
        <?php
        unset($_SESSION['changep']);
    }
?>

    <?php
        include './footer.php';
    ?>
</body>
</html>