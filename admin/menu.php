 <ul class="nav nav-list">
     <?php if ($_SESSION['role']=='admin') { ?>    
              <li class="nav-header"><i class="icon-wrench"></i> Admin</li>
              <!-- <li class="active"><a href="index.php">Admin</a></li> -->
              <li><a href="user.php">Pengurusan Pengguna</a></li>
              <li><a href="home.php">Pengurusan Rumah Sewa</a></li>
              <!-- <li><a href="admin_notis.php">Hantar Notis</a></li> -->
              <!-- <li><a href="list_contact.php">Pengurusan Pertanyaan</a></li> -->
              <!-- <li><a href="newuser.php">Pentadbir Baru</a></li>
              <li><a href="edit_delete_user.php">Pengurusan Pentadbir Baru</a></li> -->              
               <!-- <li><a href="">Laporan</a></li> -->
               <li class="nav-header"><i class="icon-home"></i> Penyewa</li>
              <li class="active"><a href="index.php">Penyewa</a></li>
              <li><a href="search.php">Carian Rumah</a></li> 
              <li><a href="gallery_list.php">Senarai Rumah</a></li> 
              
              <li class="nav-header"><i class="icon-user"></i> Pemilik Rumah</li>
              <li class="active"><a href="index.php">Pemilik Rumah</a></li>
             <li><a href="my-profile.php?id=<?php echo $rows_pentadbir['user_id'];?>">Profil</a></li>
             
              <li><a href="home_reg.php">Daftar Rumah</a></li>
              <li><a href="pemilik_rumah_admin.php">Senarai Rumah</a></li>
               <!-- <li><a href="contact_admin.php">Pertanyaan/Maklum Balas </a></li>   -->  
           <?php  } ?>    
      <?php if ($_SESSION['role']=='staff') { ?>    
              <li class="nav-header"><i class="icon-wrench"></i> Admin</li>
              <li class="active"><a href="index.php">Admin</a></li>
              <li><a href="user.php">Pengurusan Pengguna</a></li>
              <li><a href="home.php">Pengurusan Rumah Sewa</a></li>
              <li><a href="list_contact.php">Pengurusan Pertanyaan</a></li>
              <li><a href="newuser.php">Pentadbir Baru</a></li>
              <li><a href="edit_delete_user.php">Pengurusan Pentadbir Baru</a></li>
               <li><a href="">Laporan</a></li>
               
               <?php  } ?>
            
     		 <?php if ($_SESSION['role']=='penyewa') { ?> 
              <li class="nav-header"><i class="icon-home"></i> Penyewa</li>
              <li><a href="my-profile-kemaskini.php?id=<?php echo $_SESSION['user_id'];?>">Profil</a></li>
              <li class="active"><a href="index.php">Penyewa</a></li>
              <li><a href="search.php">Carian Rumah</a></li> 
              <li><a href="gallery_list.php">Senarai Rumah</a></li> 
              <!-- <li><a href="contact_admin.php">Pertanyaan/Maklum Balas</a></li>   -->
              <li class="nav-header"><i class="icon-tasks"></i> Profil</li>
              
              <li><a href="my-profile.php?id=<?php echo $_SESSION['user_id'];?>">Profil saya</a></li>
            
			 <?php  } ?>
               
                <?php if ($_SESSION['role']=='pemilik') { ?>    
                <li class="nav-header"><i class="icon-user"></i> Pemilik Rumah</li>
             <!--  <li class="active"><a href="index.php">Pemilik Rumah</a></li> -->
             <li><a href="my-profile-kemaskini.php?id=<?php echo $_SESSION['user_id'];?>">Profil</a></li>
             <li><a href="search.php">Carian Rumah</a></li> 
              <li><a href="home_reg.php">Daftar Rumah</a></li>
              <li><a href="pemilik_rumah.php">Senarai Rumah</a></li>
               <!-- <li><a href="contact_admin.php">Aduan Kerosakan </a></li>  -->
               <li class="nav-header"><i class="icon-tasks"></i> Profil</li>
              <li><a href="my-profile.php?id=<?php echo $_SESSION['user_id'];?>">Profil saya</a></li>  
                <?php  } ?> 
            
			     <li><a href="logout.php">Log Keluar</a></li>  
            </ul>