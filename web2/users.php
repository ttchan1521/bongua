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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
      <main class="container-fluid">
          <!-- <nav class="raw">
            <nav class="navbar navbar-expand-sm navbar-light bg-light col">
                <a class="navbar-brand" href="#">Administration</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-info" aria-hidden="true"></i>Videos</a>
                        </li>
                        <div class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-id-card" aria-hidden="true"></i>Users
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-comments" aria-hidden="true"></i>Report
                            </a>
                        </div>
                    </ul>
                </div>
            </nav>
          </nav> -->
        <section class="row">
           <div class="col mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" 
                    role="tab" aria-controls="home" aria-selected="true">User Editing</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" 
                    role="tab" aria-controls="profile" aria-selected="false">User List</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body" style="width: 700px">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="text"
                                            class="form-control" name="username" id="username" aria-describedby="usernameHid" placeholder="">
                                          <small id="usernameHid" class="form-text text-muted">Username is required</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Fullname</label>
                                            <input type="text"
                                              class="form-control" name="fullname" id="fullname" aria-describedby="fullnameHid" placeholder="">
                                            <small id="fullnameHid" class="form-text text-muted">Fullname is required</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="">Password</label>
                                          <input type="password"
                                            class="form-control" name="password" id="password" aria-describedby="passwordHid" placeholder="">
                                          <small id="passwordHid" class="form-text text-muted">Password is required</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text"
                                              class="form-control" name="email" id="email" aria-describedby="emailHid" placeholder="">
                                            <small id="emailHid" class="form-text text-muted">Email is required</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                           <button class="btn btn-primary">Create</button>
                           <button class="btn btn-primary">Update</button>
                           <button class="btn btn-primary">Delete</button>
                           <dbutton class="btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php 
                    if(isset($_POST['search'])) {
                    $searchKey = $_POST['search'];
                    $sql = "SELECT * FROM users WHERE accountName LIKE '%$searchKey%' ";
                } else {
                    $sql = "SELECT * FROM users ";
                    $searchKey = "";
                }
                    $result = mysqli_query($con, $sql);
                ?> 
                <div id="timelines_filter" class="dataTables_filter">
                    <form action="" method="POST"> 
			        <input type="text" name="search" class='form' 
                        placeholder="Search " value="<?php echo $searchKey; ?>" > 
			        <button style="submit" class="btn"><i class="fas fa-search"></i></button>
	                </form>
                </div>
                <table class="table table-striped">

                  

                        <tr>
                            <td>Username</td>
                            <td>Fullname</td>
                            <td>universeAmount</td>
                            <td>Role</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php while($row = mysqli_fetch_object($result)) { ?>
                        <tr>
                            <td><a href=""><?php echo $row->accountName ?></a></td>
                            <td><p><?php echo $row->firstName ?></p></td>
                            <td><p><?php echo $row->universeAmount ?></p></td>
                            <td><p><?php echo $row->isAdmin ?></p></td>
                            <td>
                                <a href=""><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                                <a href=""><i class="fa fa-trash" aria-hidden="true"></i>Detete</a>
                            </td>
                        
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            </div>
          </section>
      </main>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('#myTab a').on('click', function (event) {
            event.preventDefault()
            $(this).tab('show')
        })
    </script>
    
</body>
</html>