<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="date_type.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="date-type-box" class="date-type-box">
    <select name="date-type">
        <option value="date">Date</option>
        <option value="datetime">Date Time</option>
        <option value="year">Year</option>
    </select>
    <button type="submit" name="submit">Create</button>
</div>
<?php
    if(isset($_POST['submit'])) {
        $type = $_POST['date-type'];
        
        $id = $_GET['id'];
        $uid = $_GET['u'];
        unset($_POST['submit']);
        
        $sql = "UPDATE timelines SET dateType = 'date' WHERE universeID = $uid";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=-1");
        }
    }
?>
</body>
</html>