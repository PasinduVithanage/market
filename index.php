<?php
 require_once('db_connection/data_connection.php'); 
$sql = "SELECT * FROM `order manage`";
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
                        <div class="numbers">1,504</div>
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
                        $cus=mysqli_query($con,"SELECT COUNT(Status) FROM `order manage` WHERE Status='Delivered'");
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
                                </tr>
                                <?php  
                                }
                                ?>
                            <!-- <tr>
                                
                                
                                
                            </tr>

                            <tr>
                                <td> 02</td>
                                <td>#1112</td>
                                <td>Rashmy Denagama</td>
                                <td>13 Feb 2024</td>
                                <td>Rs.1500.00</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 03</td>
                                <td>#1113</td>
                                <td>Chathuri Janadini</td>
                                <td>13 Feb 2024</td>
                                <td>Rs.2200.00</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 04</td>
                                <td>#1114</td>
                                <td>Buddhi Bhashan</td>
                                <td>12 Feb 2024</td>
                                <td>Rs.750.00</td>
                                <td>Due</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 05</td>
                                <td>#1115</td>
                                <td>Isuru Tharaka</td>
                                <td>10 Feb 2024</td>
                                <td>Rs.1000.50</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 06</td>
                                <td>#1116</td>
                                <td>Chamitha Gimhan</td>
                                <td>11 Feb 2024</td>
                                <td>Rs.1804.00</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 07</td>
                                <td>#1117</td>
                                <td>Nihara Kanishka</td>
                                <td>12 Feb 2024</td>
                                <td>Rs.5000.00</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                        <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr>

                            <tr>
                                <td> 08</td>
                                <td>#1118</td>
                                <td>Thilangi De silva</td>
                                <td>13 Feb 2024</td>
                                <td>Rs.3200.00</td>
                                <td>Paid</td>
                                <td>
                                    <select class="statusSelect" onchange="updateStatusColor(this)">
                                      <option value="Choose">Choose</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="pending">Pending</option>
                                      <option value="return">Return</option>
                                      <option value="inProgress">In Progress</option>
                                    </select>
                                  </td>
                            </tr> -->
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
                            
                            
                        

                        <!-- <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>