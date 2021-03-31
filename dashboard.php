<?php
namespace Phppot;

use \Phppot\Member;

if (! empty($_SESSION["userId"])) {
    require_once __DIR__ . './../class/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["display_name"]);
    } else {
        $displayName = $memberResult[0]["user_name"];
    }
}

    $query="SELECT * FROM `registered_users`"; 
    $result=mysql_query($query); 
?>

<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
        <div class="dashboard">
            <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br>
                Click to <a href="./logout.php" class="logout-button">Logout</a>
            </div>
        </div>

        <table style="width:600px; line-height:40px;"> 
        <tr> 
            <th colspan="4"><h2>User Details</h2></th> 
            </tr> 
                <th> ID </th> 
                <th> Name </th> 
                <th> User Name </th> 
                <th> Email </th> 
                
            </tr> 
            
            <?php while($rows=mysql_fetch_assoc($result)) 
            { 
            ?> 
            <tr> <td><?php echo $rows['id']; ?></td> 
            <td><?php echo $rows['display_name']; ?></td> 
            <td><?php echo $rows['user_name']; ?></td> 
            <td><?php echo $rows['email']; ?></td> 
            </tr> 
        <?php 
                } 
            ?> 

        </table>


    </div>
</body>
</html>