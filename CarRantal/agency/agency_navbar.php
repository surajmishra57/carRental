<nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./agency_carstore.php"> <i class="fa-solid fa-car"></i> Agency Portal </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <?php 
                  if(isset($_SESSION['Agency']))
                  {
                    echo ' <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./agency_carstore.php">Hello '.$_SESSION['Agency'].'</a>
                    </li>';
                  }
                  else
                  {
                    echo ' <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../customer/deshboard.php"> Rent Car </a>
                    </li>';
                  }
                ?>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./agency_carstore.php"> Agency Cars</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./agency_bookedcars.php">Booked Cars</a>
                </li>

                <?php 
                  if(isset($_SESSION['Agency']))
                  {
                    echo ' <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./agency_logout.php">LogOut</a>
                    </li>';
                  }
                ?>

            </ul>
        </div>
    </div>
</nav>