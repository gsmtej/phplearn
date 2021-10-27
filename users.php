<?php include('checksession.php'); 
      include('header.php');
      include('sidebar.php');
      include('connection.php');
      $sql = "SELECT * FROM tbl_users";
      $result = $conn->query($sql);

// $row = $result -> fetch_array(MYSQLI_ASSOC);
    $usersData = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
             
              <!-- /.card-header -->
   
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>

                   <!-- in $userData all data is coming in associative array format -->
     
                  <?php foreach ($usersData as $key => $value) {
                   ?>
                    <tr>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['email'] ?></td>
                      <td><span class="tag tag-success"><?php echo $value['status'] ?></span></td>
                      <td>
                        <a title="Edit" class="btn btn-primary btn-sm mr-2 mb-2" href="">EDIT</a> 
                        <a title="Delete" class="btn btn-danger btn-sm mr-2 mb-2 delete-data" href="javascript:void(0);" id="1"><i class="fa fa-trash"></i></a> </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
        <!-- /.row -->
       
        <!-- /.row -->
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('footer.php') ?>

  