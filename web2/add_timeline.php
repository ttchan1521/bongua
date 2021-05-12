<?php
    session_start();
    include('connect_db.php');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="style_userpage.css" rel="stylesheet">
    <style>
        
        .card img {
            width: 95%;
        }
        .modal-content {
            margin-bottom: 80px;
        }
        .cancelbtn {
            float: right;
        }
        #add a {
            float: left;
            margin-top: 5px;
            height: 60px;
        }

        #add .cancelbtn {
            float: right;
            text-decoration: none;
            background-color: #999999;
            height: 30px;
            width: 80px;
            margin-right: 10px;
            padding-top: 8px;
            margin-top: 20px;
            border-radius: 4px;
        }

    </style>
</head>

<body>
    <div id="id01" class="modal" style="background-color:  #f2f2f2">
        <form class="modal-content" style="background-color:  #d9d9d9; color: #404040" method="POST">
            <div class="container">

                <h1>Create new Timeline</h1>
                <p>Please fill in this form to create an timeline</p>

                <div class="container-fluid padding" id="examples">
	                <div class="row padding">
		                <div class="col-md-4">
			                <div class="card">
				                <img class="card-img-top" src="./images/image.jpg">
				                <div class="card-body">
					                <h4 class="card-title">Timeline1</h4>
					                <p class="card-text">............................................balabla............</p>
					                <div id="add">
                                        <?php
                                            $id = $_GET['id']; 
                                        ?>
                                        <a href="trangcuathao.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary" onclick="">Add new timeline</a>
                                    </div>
				                </div>
			                </div>
		                </div>
		                <div class="col-md-4">
			                <div class="card">
				                <img class="card-img-top" src="./images/image.jpg">
				                <div class="card-body">
					                <h4 class="card-title">
						                Timeline2
					                </h4>
					                <p class="card-text">.................lbalababla.........</p>
					                <div id="add">
                                        <?php
                                            $id = $_GET['id']; 
                                        ?>
                                        <a href="trangcuathao.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary" onclick="">Add new timeline</a>
                                    </div>
				                </div>
			                </div>
		                </div>
		                <div class="col-md-4">
			                <div class="card">
				                <img class="card-img-top" src="./images/image.jpg">
				                <div class="card-body">
					                <h4 class="card-title">
						                Timeline3
					                </h4>
					                <p class="card-text">.............blabla..................</p>
					                <div id="add">
                                        <?php
                                            $id = $_GET['id']; 
                                        ?>
                                        <a href="trangcuathao.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary" onclick="">Add new timeline</a>
                                        <a href="user-web.php?id=<?php echo $id; ?>" class="cancelbtn">Cancel</a>
                                    </div> 
				                </div>
			                </div>
		                </div>
	                </div>
                </div>
                
            </div>
        </form>
    </div>
</body>

</html>