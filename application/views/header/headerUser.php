<!-- NAV -->
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="<?php echo LINK; ?>" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="<?php echo LINK; ?>">Home</a></li>
                <li><a href="<?php echo LINK; ?>/search">Search</a></li>
                <li><a href="<?php echo LINK; ?>/favourite">Favourite</a></li>

                <li><a href="<?php echo LINK; ?>/user">Welcome, <?php echo $_SESSION["username"]; ?></a></li>
                <?php if ($_SESSION["role"] == "1") { ?>
                    <li><a href="<?php echo LINK ?>/admin" class="btn btn-hover"><span>Admin Page</span></a></li>
                <?php } ?>
                <li><a href="<?php echo LINK ?>/login/logout" class="btn btn-hover"><span>Logout</span></a></li>

            </ul>
            <!-- MOBILE MENU TOGGLE -->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</div>
<!-- END NAV -->