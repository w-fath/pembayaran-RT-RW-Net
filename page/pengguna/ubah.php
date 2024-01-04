
 <?php 

 		$id = $_GET['id'];

 		$sql = $koneksi->query("select * from tb_user where id='$id'");

 		$data = $sql->fetch_assoc();

 		
 		

  ?>

 <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control"   name="username" value="<?php echo $data['username'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_user'] ?>">
                </div>


                <div class="form-group">

                              <label>Level :</label> <br>
                              <select   class="form-control"  name="level">
                                
                  <option value="admin"  <?php if ($data['level']=='admin'){ echo "selected";} ?>>Admin</option>
                  <option value="kasir"  <?php if ($data['level']=='kasir'){ echo "selected";} ?>>Kasir</option>
                                                        
                              </select>
                        </div>  

                

                 <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                    <label><img src="images/<?php echo $data['foto'] ?>" widht="100" height="100" alt=""></label>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Ganti Foto</label>
                  <input type="file"  name="foto">
                </div>

                 
                
             

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>



          <?php 



          		if (isset($_POST['simpan'])) {
          			

          			$username = $_POST['username'];
          			$nama = $_POST['nama'];
          			$password = $_POST['password'];
 $level = $_POST['level'];

          			$foto = $_FILES['foto']['name'];
          		    $lokasi = $_FILES['foto']['tmp_name'];

          		   
          			
                  if (!empty($lokasi)) {
	
                    move_uploaded_file($lokasi, "images/".$foto);
          			$sql = $koneksi->query("update  tb_user set username='$username', nama_user='$nama',  foto='$foto', level='$level' where id='$id'");

          			if ($sql) {
          				?>

          					<script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pengguna',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=pengguna';
                                });
                            }, 300);
                        </script>


          				<?php
          			}




          		}else{
          			$sql = $koneksi->query("update  tb_user set username='$username', nama_user='$nama', level='$level' where id='$id'");

          			if ($sql) {
          				?>

          					<script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pengguna',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=pengguna';
                                });
                            }, 300);
                        </script>


          				<?php
          			}
          		}
				
				}


           ?>