<div class="row-fluid">
    <div class="span3 well" style="background-color: #e6f3ff;">
        <form method="post" action="checklogin.php">
            <label>
                <input name="username" id="username" type="text" value="" placeholder="Username..." class="span12" autofocus>
            </label>
            <label>
                <input name="password" id="password" type="password" value="" placeholder="Password..." class="span12">
            </label>
            <label>
                <select name="type" class="span12">
                  <option value=1>Petugas</option>
                  <option value=2>Dosen</option>
                  <option value=3>Mahasiswa</option>
                </select>
            </label>
            <label>
                <input name="login" id="login" type="submit" value="Login" class="btn btn-block btn-inverse">
            </label>
        </form>
    </div><!--/span-->
    <div class="span9 well" id="main-content" style="background-color: #e6f3ff;">
        <div class="row-fluid">
            <div class="span12" style="text-align: center;">
                <img src="img/bukuperpus2.jpg" id="gambar" style="max-width: 300px; height: auto; display: block; margin: 0 auto;">

                <?php
                if(!isset($page)) {
                ?>
                   <h2 style="text-align: center;">Selamat Datang</h2>
                    <p style="text-align: center;">Anda dapat melakukan login di panel sebelah kiri, kemudian melakukan peminjaman buku.</p>
                    <p style="text-align: center;">Batas peminjaman buku adalah maks 1 x 2 buku / hari</p>
                    <p align="center"><MARQUEE align="center" direction="width" height="20" scrollamount="15" width="50%" font color="#006699">
                        <b>
                            <i>
                                <blink>
                                ~ Selamat datang di perpustakaan Online kami ~
                                </blink>
                            </i>
                        <b>
                    </MARQUEE></p>

                  <!--
                  <a href="?page=register" rel="tooltip" title="Daftar" class="btn btn-large btn-success">
                    <i class="icon-user icon-white"></i> Daftar
                  </a>
                  -->
                  <br /><br /><br /><br /><br />
              <?php
                } else
                    include("includes/p_". $page .".php");
              ?>

            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div>

<div class="row-fluid">
    <div class="span12 well" align="center" id="main-content-footer">
        <p>Copyright © 2024 digilibme-PENS.com. All Right Reserved<br>Design by Kelompok 3</p>
    </div>
</div>
