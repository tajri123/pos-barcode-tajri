<?php
    include_once("../../config/database.php");

    session_start();

    if($_SESSION['username'] == ""){
      header('location:../index.php');
    }
    if(isset($_POST['submit'])){
   $kat_name = $_POST['kategori'];

   if(empty($kat_name)){
    echo "<script> alert('nama kategori tidak boleh kososng')</script>";
   }
   else
   {
    $insert = $pdo->prepare(" INSERT INTO tb_category (nm_cat) value(:cat)");
    $insert->bindParam(':cat',$kat_name);

  if($insert->execute()){
    echo "<script> alert('data berhasil ditambah')</script>";
  }else{
    echo "<script> alert('data tidak berhasil ditambah')</script>";
  }
   }
    }

   

?>

<?php
    include_once("../inc/header.php");
    include_once("../inc/admin_sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Seluruh Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_filter" class="dataTables_filter">
                <label style="float:left; margin-bottom:15px">Menampilkan <input type="text">Data/halaman</label>
                <label style="float:right; margin-bottom:15px">Pencarian: <input type="text"> </label>
              </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM tb_category";
                    $stmt = $pdo->query($sql);
                    while($row = $stmt->fetch()){
                      $id = $row["id"];
                      $cat = $row ["nm_cat"];
                    
                    ?>
                    <tr>
                    <td>
                      <?= $no++ ?>
                    </td>
                    <td>
                      <?= $cat ?>
                    </td>
                    <td>
                      <a href="update.php?id=<?=$id;?>"
                     class="btn btn-info btn-sm">EDIT</a>
                     <a href="delete.php?id=<?= $id; ?>"
                     class="btn btn-danger btn-sm">hapus</a>
                    </td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  ?>

                </table>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <div class="card-footer">
              <div class="row">
                <div class="col-sm-12 col-md-9"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">menampilkan 1 dari halaman </div></div>
                
                <div class="col-sm-12 col-md-1"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div>
              </div>
              </div>
            <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="col-4">
            <div class="card card-info px-0">
                <div class="card-header">
                  <h3 class="card-title">tambah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  method="POST" action="">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="katInput" class="col-sm-4 col-form-label">Nama Kategori</label>
                      <div style="width:95%; margin: 0 auto">
                        <input type="text" class="form-control" id="KatInput" name="kategori" >
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="cold-sm-12 col-md-12"></div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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


