<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: loginAdmin.php');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="admin.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>
<!---------------- HEADER ---------------->
<form action="" method="post" id="my form">
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav__logo" style="width: 250px;" >
                <img src="../../image/Group 1.png" alt="header logo" class="header_logo">
            </div>

            <div class="nav__icon">
                <i class="ri-user-fill" onclick="toggleMenu()"></i>
            </div>
        </nav>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
            <div style="display: flex;">
                <?php
                    $user_id = $_SESSION['id_mitra'];
                    $conn =  mysqli_connect("localhost", "root", "", "ppl");
                    $select = mysqli_query($conn, "SELECT * FROM `mitra` WHERE id_mitra = '$user_id'") or die('query failed');
                    
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if ($fetch['image'] == '') {
                        echo '<img src="images/default-avatar.png">';
                    } else {
                        echo '<img class="rounded-circle" style="width: 70px;height:70px;margin: 15px;" src="../../upimage/' . $fetch['image'] . '">';
                    }
                    ?>
                          <div>
      <h3 ><?php echo $fetch['name']; ?></h3>
      <p ><?php echo $fetch['email']?></p>
      </div>
            </div>

                <ul class="sub__list">
                    <li class="sub__item">
                        <a href="#">
                            <div class="item">
                                <i class="ri-user-line"></i>
                                <p>Profile</p>
                            </div>
                        </a>
                    </li>
                    <li class="sub__item">
                        <a href="#">
                            <div class="item">
                                <i class="ri-store-2-line"></i>
                                <p>Mitra</p>
                            </div>
                        </a>
                    </li>
                    <li class="sub__item">
                        <a href="#">
                            <div class="item">
                                <i class="ri-settings-3-line"></i>
                                <p>Setting</p>
                            </div>
                        </a>
                    </li>
                    <hr>
                    <li class="sub__item">
                        <a href="#">
                            <div class="item_logout">
                                <i class="ri-login-box-line"></i>
                                <form action="" method="post">
                                    <button style="background: none;border:none;" class="dashboard-nav-item" name="logout" type="submit">Logout</button>
                                </form>

                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu")
        }
    </script>
    <script>
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click" , () =>{
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click" , () =>{
            body.classList.toggle("dark");
            
            if(body.classList.contains("dark")){
                modeText.innerText = "Light mode";
            }else{
                modeText.innerText = "Dark mode";
                
            }
        });
    </script>
</form>
<body>
    <nav class="sidebar close">
        <!-- <header>
            <div class="image-text">
                <span class="image">
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header> -->

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>



</body>