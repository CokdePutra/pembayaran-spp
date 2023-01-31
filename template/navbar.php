<!-- sidebar -->
<?php
            if(@$_SESSION['level_user'] == 'admin'){
            ?>
        <nav class="navbar">
            <div class="sidebar">
                <div class="logo">
                    <img src="../image/logo.png">
                </div>

                <!-- isi sidebar -->
                <div class="isi">
                    <ul>
                        <li class="active"><a href="../view/dashboard.php"><img src="../image/home.png" style="width:15px; height:15px; margin-right:5px;"><b>Halaman Utama</b></a></li>
                        <li><a href=""><b>Tabel Siswa</b></a></li>
                        <li><a href=""><b>Tabel Petugas</b></a></li>
                        <li><a href=""><b>Tabel SPP</b></a></li>
                        <li><a href="../view/pembayaran_spp.php"><b>Pembayaran SPP</b></a></li>
                        <li><a href=""><b>History Transaksi</b></a></li>
                        <li><a href=""><b>Laporan</b></a></li>
                    </ul>
                </div>
                <div class="logout">
                    <a href="../login/logout.php"><img src="../image/logout.png" style="width:15px; height:15px; margin-right:5px;"><b>KELUAR</b></a>
                </div>            
            </div>
        </nav>
        <?php
            }
        ?>
        
        <!-- navbar -->
        <div class="nav-profile">

            <div class="hamburger-menu">
                    <?php
                        if(@$_SESSION['level_user'] == 'admin'){
                    ?>
                <a href="#" id="hamburger-menu"><img src="../image/menu.png" width="40px" height="40px"></a>
                    <?php
                    }
                    ?>
                    <?php
                        if(@$_SESSION['level_user'] == 'siswa'){
                    ?>
            <div class="out">
                <a href="../login/logout.php"><img src="../image/logout.png" width="40px" height="40px"></a>
            </div>
                    <?php
                        }
                    ?>
            </div>

            <div class="profile">
                <a href="#" id="profile-menu"><img src="../image/profile.png" width="35px" height="35px"></a>
            </div>
        </div>
        <!-- tutup navbar -->