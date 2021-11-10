<?php 
      include('checksession.php');
      include('header.php');
      include('sidebar.php');
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
                <h3 class="card-title">Add Event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($_SESSION['error_email_msg'])){ ?>
              <div class="alert alert-danger">
                  <?php echo $_SESSION['error_email_msg'] ?> 
              </div>
            <?php } ?>
             <?php if(isset($_SESSION['success_msg'])){ ?>
              <div class="alert alert-success">
                  <?php echo $_SESSION['success_msg'] ?> 
              </div>
            <?php } ?>
              <form action="event_submit.php" method="post">
                
                <div class="card-body">
                	 <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" name="event_name" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter event name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Event Date</label>
                    <input type="text" name="event_date" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter event name">
                  </div>
                

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript">
  $('input[name="event_date"]').daterangepicker({
    timePicker: true,
    // startDate: moment().startOf('hour'),
    // endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
  });

</script>