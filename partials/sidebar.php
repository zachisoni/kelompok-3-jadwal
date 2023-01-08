<div class="sidebar px-4 py-4 w-25">
    <div class="header-box">
        <h3 class="rounded text-center">E - Schedule</h3>
    </div>
    <ul class="list-unstyled my-5 ">
        <li class="profile py-3 pe-5 d-flex align-items-center bg-light rounded-5">
            <i class="fa-solid fa-user-large text-primary fa-xl mx-4"></i>Admin
            <!-- <p class="fs-11">Admin</p> -->
        </li>
        <a href="admin_upload.php" class="text-decoration-none text-dark">
            <li class="list-item ms-3 <?php if ($isActive == "unggah-jadwal") {
                                                                echo 'active shadow ';
                                                        } ?> ">
                <i class="fa-solid fa-file-import fa-xl me-3"></i>Unggah Jadwal
            </li>
        </a>
        <li>
        </li>
    </ul>

    <form action="logout.php">
        <button type="submit" class="btn btn-danger text-decoration-none text-light bottom-0" name="logout">
            Logout <i class="fa-solid fa-right-from-bracket fa-sm ms-3"></i></button>
    </form>
</div>