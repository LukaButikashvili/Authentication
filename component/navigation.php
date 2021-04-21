

<header class="header">
    <nav>
        <div>
            <h1>WebSite</h1>
        </div>
        <ul>
            <li>
                <a href="index.php" >
                    Home
                </a>    
            </li>
            <li>
                <a href="index.php" >
                    Contact
                </a> 
            </li>
            <li>
                <a href="users.php" >
                    Users
                </a> 
            </li>
            <?php 
                session_start();
                if(!isset($_SESSION['username'])):
            ?>
                <li class="drop-down">
                    <i class="fas fa-user"></i>
                    <div class="dropdown-content">
                        <div>
                            <a href="login.php" >Log In</a>
                        </div>
                        <div>
                            <a href="registration.php" >Registration</a>
                        </div>
                    </div>
                </li>
            <?php else:
                $user = $_SESSION['username'];
            ?>
                <li>
                    <a href="userPage.php" >
                        <?php echo $user ?>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</header>
