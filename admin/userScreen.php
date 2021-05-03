<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="header">
        <a class="logo">Timeline</a>
        <div class="header-right">
            <a href="logout.php"><i class="material-icons">&#xe7ff;</i>Logout</a>
        </div>
    </div>

    <button class="create-button" onclick="document.getElementById('createForm').style.display='block'">New</button>
    
    <div id="createForm" class="modal">
        <span onclick="document.getElementById('createForm').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="/action_page.php">
          <div class="container">
            <h1>Create New Timeline</h1>
            <p>Please enter name</p>
            <hr>
            <label for="name"><b>Name</b></label>
            <input type="text" name="name" required>
      
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('createForm').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" class="createbtn">Create</button>
            </div>
          </div>
        </form>
    </div>
    <div class="tab">
        <div class="tab-div">
            <button class="tab-left"><i class="material-icons" >&#xe24d;</i>hjsksls</button>
            <div class="dropdown">
                <button class="tab-icon" onclick="dropdown()"><i class="material-icons" >&#xe5d3;</i></button>
                <div id="dropdown" class="dropdown-content">
                    <a>remove</a>
                </div>
            </div>
            
        </div>

        <div class="tab-div">
            <button class="tab-left"><i class="material-icons">&#xe24d;</i>dfghjk</button>
            <div class="dropdown">
                <button class="tab-icon" onclick="dropdown1()"><i class="material-icons">&#xe5d3;</i></button>
                <div id="dropdown1" class="dropdown-content">
                    <a onclick="remove()">remove</a>
                </div>
            </div>
        </div>
        
    </div>


    


    <script>
        function dropdown() {
            document.getElementById("dropdown").classList.toggle("show");
        }

        function dropdown1() {
            document.getElementById("dropdown1").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.tab-icon')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        function remove() {
            alert("c");
        }
    </script>
    
</body>
</html>