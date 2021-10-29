<?php include('checksession.php'); 
      include('header.php');
      include('sidebar.php');
      include('connection.php');
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
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
          <?php if(isset($_SESSION['error_msg'])){ ?>
              <div class="alert alert-danger">
                  <?php echo $_SESSION['error_msg'] ?> 
              </div>
        <?php } ?>
            <?php if(isset($_SESSION['success_msg'])){ ?>
              <div class="alert alert-success">
                  <?php echo $_SESSION['success_msg'] ?> 
              </div>
            <?php } ?>
              <form action="user_update_password.php" method="post" >
                <input type="hidden" name="user_id" value="<?php echo $userData[0]['user_id'] ?>">
                <div class="card-body">
                	 <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="password" name="old_password" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter Old Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" name="new_password" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" name="confirm_password" value="" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password">
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
 <?php include('footer.php');
  unset($_SESSION['error_msg']);
  unset($_SESSION['success_msg']);
 ?>