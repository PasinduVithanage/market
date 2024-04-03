<?php
 require_once('db_connection/data_connection.php'); 
$sql = "SELECT * FROM `order manage` ORDER BY `order manage`.`No` ASC ";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                          <!-- <ion-icon name="logo-apple"></ion-icon>--> 
                        </span>
                        <span class="title">ID Trade Center</span>
                    </a>
                </li>
                <li>
    

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php
                        $cus=mysqli_query($con,"SELECT COUNT(No) FROM `order manage`");
                        while($row = mysqli_fetch_assoc($cus) )  {
                            echo $row['COUNT(No)'];
                        }
                        ?></div>
                        <div class="cardName">Daily Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                        $cus=mysqli_query($con,"SELECT COUNT(No) FROM `order manage`");
                        while($row = mysqli_fetch_assoc($cus) )  {
                            echo $row['COUNT(No)'];
                        }
                        ?>
                        </div>
                        <div class="cardName">Total Customers</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php
                        $cus=mysqli_query($con,"SELECT COUNT(Status) FROM `order manage` WHERE Status='delivered'");
                        while($row = mysqli_fetch_assoc($cus) )  {
                            echo $row['COUNT(Status)'];
                        }
                        ?></div>
                        <div class="cardName">Total Delivery</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <div class="numbers"><?php
                        $sum=mysqli_query($con,"SELECT SUM(Price) FROM `order manage`");
                        while($row = mysqli_fetch_assoc($sum) )  {
                            echo $row['SUM(Price)'];
                        }
                        ?></div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Order List</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                               
                                <td>No</td>
                                <td>Order ID</td>
                                <td>User name</td>
                                <td>Date</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                             <?php
                                while($row = mysqli_fetch_assoc($result)){
                                 ?>
                                <td><?php echo $row['No']?></td>
                                <td><?php echo $row['Oerder ID']?></td>
                                <td><?php echo $row['User Name']?></td>
                                <td><?php echo $row['Date']?></td>
                                <td><?php echo $row['Price']?></td>
                                <td><?php echo $row['Payment']?></td>
                                <td><?php echo $row['Status']?></td>
                                <td>
                                    <select  class="statusSelect" onchange="updateStatusColor(this, '<?php echo $row['No']; ?>')">
                                      <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                                  <td>
                                    <a class='btn btn-danger btn-sm' href="delete.php?No=<?php echo $row['No']?>">Delete</a>
                                    </td>
                                </tr>
                                <?php  
                                }
                                ?>
                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                       
                            <?php
                            $recent=mysqli_query($con,"SELECT * FROM `order manage` ORDER BY `order manage`.`Date` DESC LIMIT 5");
                                    while($row = mysqli_fetch_assoc($recent)){
                                    ?>
                                    <td width="60px">
                                        <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                                    </td>
                                    <td>
                                        <h4><?php echo $row['User Name']?> </h4>
                                    </td>
                                    </tr>
                                    <?php
                                    }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script>
        

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>