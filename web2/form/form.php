<?php
  session_start();
  include('connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
  


</head>
<body>
    <div class="timeline" id="content" style="background-color: #19529C">
        <?php 
          $id = $_GET['id'];
          $sql = "SELECT * FROM events WHERE universeID = $id ORDER BY eventYear";
          $res = mysqli_query($con, $sql);

          if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
              $t = 0;
              while($row = mysqli_fetch_assoc($res)) 
              {
                $eid = $row['eventID'];
                $eventName = $row['eventName'];
                $description = $row['eventDescription'];
                $year = $row['eventYear'];
                
                if ($t % 2 == 0) {

                ?>
                  <div class="container right" >
                    <div style="position: relative; right: 180px; bottom:13px;">
                      <h1 style="color: white"><?php echo $year; ?></h1>
                    </div>
                    <div class="content" style="position:relative; bottom: 65px">
                    <div class="dropdown">
                      <h2><?php echo $eventName; ?></h2>
                      <div class="dropdown-content">
                      <a href="edit_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Edit</a>
                      <a href="delete_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Delete</a>
                      </div>
                      </div>
                      <p><?php echo $description; ?></p>
                    </div>
                  </div>
                <?php
                }
                else {
                  ?>
                  <div class="container left" >
                    <div style="position: relative; left: 600px; bottom:13px;">
                      <h1 style="color: white"><?php echo $year; ?></h1>
                    </div>
                    <div class="content" style="position:relative; bottom: 65px">
                    <div class="dropdown">
                      <h2><?php echo $eventName; ?></h2>
                      <div class="dropdown-content">
                      <a href="edit_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Edit</a>
                      <a href="delete_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Delete</a>
                      </div>
                      </div>
                      <p><?php echo $description; ?></p>
                    </div>
                  </div>
                <?php
                }
                $t = $t + 1;
              }
            }
            else echo "There's nothing";
          }
        ?>
        
      </div>
      <button class="savebtn" id="save" ><i class="fa fa-save"></i></button>
      <a href="add_event.php?id=<?php echo $id; ?>" class="add-icon"><i class="fas fa-plus"></i></a>
      <a onclick="window.location.href='../user-web.php?id=<?php echo $_SESSION['userID']; ?>'" class="close-icon"><i class="fas fa-times"></i></a>

      <script>
        window.onload = function() {
          document.getElementById("save").addEventListener("click", ()=> {
            const invoice = this.document.getElementById("content");
            console.log(invoice);
            console.log(window);
            var opt = {
              margin: 1,
              image: {type: 'jpeg', quality: 0.98},
              html2canvas: {sclae: 2},
              jsPDF: {unit: 'in', format: 'letter', orientation: 'portrait'}
            }
            html2pdf().from(invoice).set(opt).save();
          })
        }
      </script>
        
</body>
</html>