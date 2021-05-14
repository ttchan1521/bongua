<?php 
    session_start();
    include('connect_db.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
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
                    role="tab" aria-controls="home" aria-selected="true">Edit Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" 
                    role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
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
                                            class="form-control" name="username" id="username" aria-describedby="usernameHid" placeholder="Enter UserName">
                                          <small id="usernameHid" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Your Firstname</label>
                                            <input type="text"
                                              class="form-control" name="firstname" id="firstname" aria-describedby="firstnameHid" placeholder="Enter Firstname">
                                            <small id="firstnameHid" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="">Your LastName</label>
                                          <input type="text"
                                            class="form-control" name="lastname" id="lastname" aria-describedby="lastNameHid" placeholder="Enter LastName">
                                          <small id="lastNameHid" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="text"
                                              class="form-control" name="email" id="email" aria-describedby="emailHid" placeholder="Enter Email">
                                            <small id="emailHid" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                           <button class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="" method="post">
                        <div class="card">
                            <div class="card-body" style="width: 400px">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="text"
                                            class="form-control" name="username" id="username" aria-describedby="usernameHid" placeholder="Enter Username">
                                          <small id="usernameHid" class="form-text text-muted">Username is required</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Password</label>
                                            <input type="password"
                                              class="form-control" name="password" id="password" aria-describedby="fullnameHid" placeholder="Enter Password">
                                            <small id="fullnameHid" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Current Password</label>
                                          <input type="password"
                                            class="form-control" name="currentPassword" id="currentPassword" aria-describedby="currentPasswordHid" placeholder="Current Password">
                                          <small id="currentPasswordHid" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password"
                                              class="form-control" name="comfirmPassword" id="comfirmPassword" aria-describedby="comfirmPasswordHid" placeholder="Confirm Password">
                                            <small id="comfirmPassword" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                           <button class="btn btn-secondary">Change password</button>
                        </div>
                    </form>
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