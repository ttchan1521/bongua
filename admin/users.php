<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    $sql = "SELECT * FROM users";

    $res = mysqli_query($con, $sql);

    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Users</h1>
        <div class="timeline-items">
            <ul>
                <li class="timeline-item-heading">
                    <div class="timeline-prop timeline-name" style = "width: 705px">UserName</div>
                    <div class="timeline-prop timeline-time" style = "50px">Amount</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                    $id = $row['userID'];
                    ?>
                    <li>
                        <a href="user.php?id=<?php echo $id ?>" class="line">
                            <div class="line">
                                <div class="timeline-prop timeline-name" style = "width: 705px"><?= $row['accountName'] ?></div>
                    
                                <div class="timeline-prop timeline-time"><?= $row['universeAmount'] ?></div>
                                <div class="clear-both"></div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php
            
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>