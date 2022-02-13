<nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./deshboard.php"> <i class="fa-solid fa-car"></i> CarRantal </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../agency/agency_login_page.php">Agency</a>
                </li>

                <?php
                
                        if (isset($_SESSION['rName'])) {
                        
                        echo '<li class="nav-item">
                          <a class="nav-link active" href="./user_info_page.php"><i class="fas fa-user"></i> Hello '. $_SESSION['rName'] .'</a>
                        </li>';
                        echo '<li class="nav-item">
                          <a class="nav-link active " href="./search.php"><i class="fa-solid fa-car-side"></i> Search Cars</a>
                        </li>';
                        echo '<li class="nav-item">
                          <a class="nav-link active " href="../agency/agency_logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LogOut</a>
                        </li>';
                    } else {
                       
                        echo '<li class="nav-item">
                          <a class="nav-link active" href="./login_page.php"><i class="fas fa-user"></i> Hello { User }</a>
                        </li>';
                        echo '<li class="nav-item">
                          <a class="nav-link active " href="./login_page.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In</a>
                        </li>';
                        echo '<li class="nav-item">
                          <a class="nav-link active" href="./register_page.php"><i class="fa-solid fa-user-plus"></i> Sign Up</a>
                        </li>';
                        }
                ?>
            </ul>
        </div>
    </div>
</nav>