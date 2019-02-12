<!-- NAVBAR TOP START -->
<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <!-- SEARCH FORM START -->
        <form action="/dashboard.php?section=lawyers&page=1" method="post" class="main-navbar__search w-100 row d-none d-md-flex d-lg-flex align-items-center mx-0">
            <?php
                if(isset($_GET["section"])):
                    switch ($_GET["section"]){
                        case "lawyers":{
                            echo "<input type='hidden' value='lawyers' name='section'/>";
                            include "dashboard-search-lawyer.php";
                            break;
                        }
                    }
                endif;
            ?>
        </form>
        <!-- SEARCH FORM END-->
        <ul class="navbar-nav border-left flex-row ">
            <!-- NAVBAR NOTIFACATION START -->
            <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                    $notifications = db_select("notification","checked = false");
                ?>
                <div class="nav-link-icon__wrapper">
                    <i class="material-icons">&#xE7F4;</i>
                    <span class="badge badge-pill badge-danger">
                        <?=count( $notifications)?>
                    </span>
                </div>
                </a>
                <!-- READING ALL NOTIFICATION START -->
                <div class="dropdown-menu dropdown-menu-small notifications-container">
                    <?php
                        $notifications = db_select("notification","checked = false");
                        foreach($notifications as $not):
 
                            $icon = "fab fa-black-tie fa-1x";
                            $link = "/dashboard.php";
                            $desc_array = unserialize($not["description"]);
                            $desc = $desc_array["desc"];
                            switch($not["type"]){
                                case "lawyer_insert":{
                                    $icon = "fab fa-black-tie fa-1x";
                                    $id = $desc_array["lawyer_id"];
                                    $link = "/dashboard.php?not_id=".$not['id'];$link .= "&section=edit-lawyer&id=".$id;
                                    break;
                                }    
                            }
                    ?>
                    <a 
                        class="dropdown-item dashboard-notification" 
                        href="<?=$link?>"
                    >
                        <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                                <i class="<?=$icon?>"></i>
                            </div>
                        </div>
                        <div class="notification__content">
                            <span class="notification__category">
                                <?=$not["title"]?>
                            </span>
                            <p>
                                <?=$desc?>
                            </p>
                        </div>
                    </a>
                    <?php
                        endforeach;

                        if(count( $notifications)==0):
                    ?>
                        <button href="#" class="dropdown-item dashboard-notification" disabled >   
                            <div class="notification__content text-muted text-center">
                                <p>
                                    Aucune notification pour le moment
                                </p>
                            </div>
                        </button>
                    <?php endif;?>
                </div>
                <!-- READING ALL NOTIFICATION END -->
            </li>
            <!-- NAVBAR NOTIFACATION END -->
            <!-- USER AVATAR START -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle mr-2" src="https://cdn-grid.fotosearch.com/CSP/CSP283/businessman-avatar-profile-picture-clip-art__k17797076.jpg" alt="User Avatar">
                <span class="d-none d-md-inline-block">Mr lawyer criminal</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item" href="user-profile-lite.html">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                <a class="dropdown-item" href="components-blog-posts.html">
                    <i class="material-icons">vertical_split</i> Blog Posts</a>
                <a class="dropdown-item" href="add-new-post.html">
                    <i class="material-icons">note_add</i> Add New Post</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#">
                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                </div>
            </li>
            <!-- USER AVATAR END -->
        </ul>
        <nav class="nav">
        <!-- navbar toggle for mobile start-->
            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
            </a>
            <!-- navbar toggle for mobile end-->
        </nav>
    </nav>
</div>
<!-- NAVBAR TOP END -->