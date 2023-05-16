<?php
    include_once("../../config/database.php");

    session_start();

    if($_SESSION['username'] == ""){
      header('location:../index.php');
    }

    $queryId = $_GET['id'];

    if(isset($_POST['update'])){
   $category = $_POST["kategori"];

   $sql ="UPDATE tb_category SET nm_cat='$category' 
    WHERE id='$queryId'";
    $result = $pdo->query($sql);
    if($result)
    {
      echo "<script> alert('Data berhasil diperbarui')</script>";
    }else{
        echo "<script> alert('data tidak dapat diperbarui')</script>";
    }
    }

   

?>

<?php
    include_once("../inc/header.php");
    include_once("../inc/admin_sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <?php
  $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
  $stmt = $pdo->query($sql);
  while($rows =$stmt->fetch()){
    $data_nama =$rows["nm_cat"];
  }
  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
        
            
              <!-- /.card-header -->
            
            <!-- /.card -->
            <div class="col-7 mx-auto">
            <div class="card card-info px-0">
                <div class="card-header">
                  <h3 class="card-title">ubah kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  method="POST" action="">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="katInput" class="col-sm-4 col-form-label">Nama Kategori</label>
                      <div style="width:95%; margin: 0 auto">
                        <input type="text" class="form-control" id="KatInput" name="kategori" value="<?=$data_nama?>">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="cold-sm-12 col-md-12"></div>
                    <button type="submit" name="update" class="btn btn-primary">perbarui</button>
                    <a href="index.php" class="btn btn-info">kembali</a>

                  </div>
                  </form>
                  </div>
                  
          <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
       
       
      </div>
      <!-- /.container-fluid -->
    </section>
    
    
   
    
    <!-- /.content -->
    
  </div>
  
  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->

<?php
    include_once("../inc/footer.php");
?>

<!-- Page specific script -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "language": {
            "lengthMenu": "Menampilkan _MENU_ Data/Halaman",
            "zeroRecords": "Tidak Ada Data Ditemukan",
            "info": "Menampilkan _PAGE_ Dari _PAGES_ Halaman",
            "infoEmpty": "Tidak Ada Data Tersedia",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Pencarian:",
      }
    });
  });
</script>


