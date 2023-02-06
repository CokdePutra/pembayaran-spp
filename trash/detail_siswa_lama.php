<tr>
                                    <?php
                                    
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Juli' AND nis='$nis_global'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                    ?>
                                    <td>1</td>
                                    <td>Juli</td>
                                    <td>2022-06-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                        <?php
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!$cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Juli">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>


                                
                                <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Agustus' AND nis='$nis_global'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>2</td>
                                    <td>Agustus</td>
                                    <td>2022-07-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                        <?php
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!$cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Agustus">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='September' AND nis='$nis_global'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>3</td>
                                    <td>September</td>
                                    <td>2022-08-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                        <?php
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!$cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="September">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Oktober' AND nis='$nis_global'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>4</td>
                                    <td>Oktober</td>
                                    <td>2022-09-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Oktober">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='November' AND nis='$nis_global'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>5</td>
                                    <td>November</td>
                                    <td>2022-10-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="November">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Desember'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>6</td>
                                    <td>Desember</td>
                                    <td>2022-11-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Desember'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Desember">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Januari'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>7</td>
                                    <td>Januari</td>
                                    <td>2022-12-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Januari'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Januari">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Februari'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>8</td>
                                    <td>Februari</td>
                                    <td>2023-01-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Februari'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Februari">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Maret'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>9</td>
                                    <td>Maret</td>
                                    <td>2023-02-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Maret'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Maret">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='April'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>10</td>
                                    <td>April</td>
                                    <td>2023-03-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='April'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="April">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Mei'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>11</td>
                                    <td>Mei</td>
                                    <td>2023-04-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Mei'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Mei">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                
                                    
                                <tr>
                                    <?php
                                    $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='Juni'");
                                    $row_bulan = mysqli_fetch_assoc($hasil_bulan)
                                    ?>
                                    <td>12</td>
                                    <td>Juni</td>
                                    <td>2023-05-10</td>
                                    <td><?= $row_bulan['tanggal_bayar']?></td>
                                    <td><?= $row_bulan['jumlah_bayar']?></td>
                                    <td><?= $row_bulan['status']?></td>
                                    <td>
                                    <?php
                                            $hasil_bulan = mysqli_query($koneksi,"SELECT bulan FROM pembayaran_spp WHERE bulan='Juni'");
                                            $cek_bulan = mysqli_num_rows($hasil_bulan);
                                            if(!    $cek_bulan > 0){
                                        ?>
                                        <input class="btn-bayar" type="submit" value="BAYAR">
                                        <input type="text" hidden name="bulan" value="Juni">
                                        <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                        <?php
                                            } else {
                                                ?>
                                                <input class="btn-bayar-disable" disabled type="submit" value="BAYAR">
                                                <?php
                                            }
                                        ?>
                                    </td>