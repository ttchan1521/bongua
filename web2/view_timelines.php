<?php 
    session_start();
    include('connect_db.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>
    <section class="row">
    <div class="col mt-4">
    <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <?php 
                        $id = $_GET['id'];
                        if(isset($_POST['search'])) {
                        $searchKey = $_POST['search'];
                        $sql = "SELECT * FROM timelines WHERE userID=$id AND universesName LIKE '%$searchKey%' ";
                        } else {
                        $sql = "SELECT * FROM timelines WHERE userID=$id ";
                        $searchKey = "";
                        }
                        $result = mysqli_query($con, $sql);
                    ?> 
                
                    <div class="search_form" style="width: 100%;">
                        
                        <form action="" method="POST" style="display: inline-block; width: 350px;"> 
			                <input type="text" name="search" class="form-control" 
                                placeholder="Search by TimelineName" value="<?php echo $searchKey; ?>" 
                                style="display: inline; width: 230px; margin-top: 15px;
                                margin-bottom: 12px;"> 
			                <button style="submit" class="btn btn-outline-secondary" style="margin-bottom: 12px!important;"><i class="fas fa-search"></i></button>
	                    </form>

                        <form action="change_length.php" method="POST" style="float: right; margin-top: 35px;">
                            <label> Option show </label>
                            <select name="timelines_length" aria-controls="timelines" >
                                    <?php 
                                    if (!isset($_SESSION['length'])) {
                                        ?>
                                        <option value=10 selected>10</option>
                                        <option value=20>20</option>
                                        <option value=50>50</option>
                                    <?php 
                                        } elseif ($_SESSION['length'] == 50) {
                                             ?>
                                         <option value=10>10</option>
                                        <option value=20>20</option>
                                        <option value=50 selected>50</option>
                                    <?php
                                            } elseif ($_SESSION['length'] == 20) {
                                        ?>
                                        <option value=10>10</option>
                                        <option value=20 selected>20</option>
                                        <option value=50>50</option>
                                    <?php    
                                        } else {
                                    ?>
                                        <option value=10 selected>10</option>
                                        <option value=20>20</option>
                                        <option value=50>50</option>
                                     <?php
                                    }
                                ?>
                            </select>
                            <button type="submit" name="smlength" 
                                style="height: 25px; width: 70px;">  
                                Execute
                            </button>
                        </form>
                    </div>
                

                    <table class="table table-striped">
                        <tr>
                            <td>Timelinename</td>
                            <td>Last update</td>
                            <td>Role</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php
                        $mysql = "SELECT * FROM users WHERE userID = $id";
                        $res = mysqli_query($con, $mysql);
                        $r = mysqli_fetch_assoc($res);
                        $user = $r['accountName'];
                        while($row = mysqli_fetch_object($result)) { 
                        ?>
                        <tr>
                            <td><p><?php echo $row->universesName ?></p></td>
                            <td><p><?php echo $row->last_updated ?></p></td>
                            <td><p><?php echo $user ?></p></td>

                            <td>
                                <a href=""><i class="fa fa-trash" ></i>Detete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <nav aria-label="Page navigation example" style="float: right;">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>
            </div>
        </div>
    </section>
</body>
</html>