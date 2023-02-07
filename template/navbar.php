<!-- sidebar -->
<?php
            if(@$_SESSION['level_user'] == 'admin'){

                $active = $_GET['page'];
            ?>
        <nav class="navbar">
            <div class="sidebar">
                <div class="logo">
                    <img src="../image/logo.png">
                </div>

                <!-- isi sidebar -->
                <div class="isi">
                    <ul>
                        <li class="<?php if($active == 'dashboard') echo "active" ?>"><a href="../view/dashboard.php?page=dashboard"><img src="../image/home-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>Halaman Utama</b></a></li>
                        <li class="<?php if($active == 'siswa') echo "active" ?>"><a href="../view/tb_siswa.php?page=siswa"><img src="../image/tb_siswa-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>Tabel Siswa</b></a></li>
                        <li class="<?php if($active == 'petugas') echo "active" ?>"><a href=""><img src="../image/tb_petugas-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>Tabel Petugas</b></a></li>
                        <li class="<?php if($active == 'spp') echo "active" ?>"><a href=""><img src="../image/spp-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>Tabel SPP</b></a></li>
                        <li class="<?php if($active == 'pembayaran') echo "active" ?>"><a href="../view/pembayaran_spp.php?page=pembayaran"><img src="../image/receipt-logo.png" style="width:17px; height:17px; margin-right:5px;"><b>Pembayaran SPP</b></a></li>
                        <li><a href=""><img src="../image/history-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>History Transaksi</b></a></li>
                        <li><a href=""><img src="../image/laporan-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>Laporan</b></a></li>
                    </ul>
                </div>
                <div class="logout">
                    <a href="../login/logout.php"><img src="../image/logout-logo.png" style="width:15px; height:15px; margin-right:5px;"><b>KELUAR</b></a>
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
                <p><a href="../login/logout.php"><img src="../image/logout-logo.png" width="40px" height="40px"></a>KELUAR</p>
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