<style type="text/css">
  nav{
      position: fixed;
    width: 100%;
    z-index: 99999;
  background: #1E90FF;
  padding: 1px 20px;
}
nav ul{
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}
nav ul li{
  padding: 15px 0;
  cursor: pointer;
}
nav ul li.items{
  position: relative;
  width: auto;
  margin: 0 16px;
  text-align: center;
  order: 3;
}
nav ul li.items:after{
  position: absolute;
  content: '';
  left: 0;
  bottom: 5px;
  height: 2px;
  width: 100%;
  background: #33ffff;
  opacity: 0;
  transition: all 0.2s linear;
}
nav ul li.items:hover:after{
  opacity: 1;
  bottom: 8px;
}
nav ul li.logo{
  flex: 1;
  color: white;
  font-size: 23px;
  font-weight: 600;
  cursor: default;
  user-select: none;
}
nav ul li a{
  color: white;
  font-size: 18px;
  text-decoration: none;
  transition: .4s;
}
nav ul li:hover a{
  color: cyan;
}
nav ul li i{
  font-size: 23px;
}
nav ul li.btn1{

  display: none;
}

nav ul li.btn1.hide i:before{
  content: '\f00d';
}
@media all and (max-width: 900px){
  nav{
    padding: 5px 30px;

  }
  nav ul li.items{
    width: 100%;
    display: none;

  }
  nav ul li.items.show{
    display: block;

  }
  nav ul li.btn1{
    display: block;

  }
  nav ul li.items:hover{
    border-radius: 5px;
    box-shadow: inset 0 0 5px #33ffff,
                inset 0 0 10px #66ffff;
  }
  nav ul li.items:hover:after{
    opacity: 0;
  }
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="fontawesome/js/all.min.js"></script>
 <script src="admin/assets/js/jquery-1.10.2.js"></script>
	<nav>
      <ul>
<li class="logo">BOSE KOI FARM</li>
<li class="items"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
<li class="items"><a href="pengembalian.php">Pengembalian</a></li>
<?php 
include 'koneksi.php';
if (isset($_SESSION["pelanggan"])):?>
	<li class="items"><a href="logout.php">Logout</a></li>
	<li class="items"><a href="riwayat.php">Riwayat Pembelian</a></li>
  <?php 
$id_pelanggan= $_SESSION["pelanggan"]['id_pelanggan'];
$ambil= $koneksi->query("SELECT *FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah=$ambil->fetch_assoc();?>
	<li class="items"><a href="profil.php"><img src="fotoprofil/<?php echo $pecah["fotoprofil"] ?>" width="22px" style="border-radius: 15px; -moz-border-radius:15px; border: 2px solid crimson;"></a></li>
<?php else: ?>
	<li class="items"><a href="login.php">Login</a></li>
	<li class="items"><a href="daftar.php">Daftar</a></li>
<?php endif ?> 
<li class="btn1"><a href="#"><i class="fas fa-bars"></i></a></li>
</ul>
</nav>
    <script>
      $(document).ready(function(){
        $('.btn1').click(function(){
          $('.logo').toggleClass("show");
          $('.btn1').toggleClass("show");
          $('.items').toggleClass("show");
          $('ul li').toggleClass("hide");
        });
      });
    </script>
    <br>
    <br>