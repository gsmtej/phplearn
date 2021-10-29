<?php 
      include('checksession.php');
      include('header.php');
      include('sidebar.php');
      include('connection.php'); 
      $userID = $_GET['user_id'];//get userid from query string from url 
      $sql = "SELECT * FROM tbl_users where user_id = '$userID'";//query to get that user data which we have edited now
      $result = $conn->query($sql);// pass sql query in conn object which already created in connection file
      $userData = mysqli_fetch_all($result, MYSQLI_ASSOC);// fetch user data in associative array
      //print_r($userData);// dump and die


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($_SESSION['error_email_msg'])){ ?>
              <div class="alert alert-danger">
                  <?php echo $_SESSION['error_email_msg'] ?> 
              </div>
            <?php } ?>
              <form action="user_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $userData[0]['user_id'] ?>">
                <div class="card-body">
                	 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="<?php echo $userData[0]['name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?php echo $userData[0]['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="uploads/<?php  echo $userData[0]['user_image']  ?>" alt="User profile picture">
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" <?php echo $userData[0]['status']=='Active' ?'checked':'' ?>>
                    <label class="form-check-label" for="exampleCheck1" >Status</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
            <!-- /.card -->

         
           
          </div>
          <!--/.col (left) -->

  
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('footer.php'); unset($_SESSION['error_email_msg']); ?>