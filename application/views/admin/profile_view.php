<style>
  .avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 22px;
  }

  .avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 139px;
  }

  .avatar-upload .avatar-edit input {
    display: none;
  }

  .avatar-upload .avatar-edit input+label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
    border: 1px solid black;
  }

  .avatar-upload .avatar-edit input+label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
  }

  .avatar-upload .avatar-edit input+label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 7px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
  }

  .avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
  }

  .avatar-upload .avatar-preview>div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
</style>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile View</h1>

  </div>
  <!-- Content Row -->
  <div class="row">

    <div class="col-12 mt-3">
      <div class="card border-top">
        <?php //print_r($details); 
        ?>
        <div class="card-body">
          <div class="row">
            <div class="mb-2 col-md-12" style="text-align: center;">
           
              <?php if (($details['photo'] == "")) { ?>
                <img src="<?php echo base_url(); ?>assets/admin/img/undraw_profile.svg" alt="" width="21%">
              <?php } else { ?>
                <img src="<?php echo base_url() . 'uploads/admin/profile/' . $superadmin['photo']; ?>" alt="" width="21%">
              <?php } ?>
            </div>
          </div>
        
          <?php if (encryptids("D", $_SESSION['admin_type']) == 1) { ?>
            <div class="row">
            <div class="mb-2 col-md-4">

              <label class="d-block text-font">Name</label>
              <p><?php echo $superadmin['name']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Email Id</label>
              <p><?php echo $superadmin['email_id']; ?></p>

            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Designation</label>

              <p><?php echo $superadmin['designation']; ?></p>

            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Branch</label>

              <p><?php echo $superadmin['branch']; ?></p>

            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Post</label>

              <p><?php echo $superadmin['post']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Department</label>
              <p><?php echo $superadmin['department']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Username</label>
              <p><?php echo $superadmin['username']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Password</label>
              <p><?php echo $superadmin['password']; ?></p>
            </div>

            <!-- <div class="mb-2 col-md-4">
              <label class="d-block text-font">Gender</label>
              <p><?php if ($superadmin['gender'] = 1) {
                    echo 'Male';
                  } else if ($superadmin['gender'] = 2) {
                    echo  "Female";
                  } else {
                    echo "-";
                  }  ?></p>
            </div> -->
           
          
          


            
            
          </div>
          <?php } else { ?>
            <div class="row">
            <div class="mb-2 col-md-4">

              <label class="d-block text-font">Name</label>
              <p><?php echo $details['name']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">DOB</label>

              <p><?php echo $details['dob']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Gender</label>
              <p><?php if ($details['gender'] = 1) {
                    echo 'Male';
                  } else if ($details['gender'] = 2) {
                    echo  "Female";
                  } else {
                    echo "-";
                  }  ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Contact Number</label>
              <p><?php echo $details['contact_number']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Email Id</label>
              <p><?php echo $details['email_id']; ?></p>

            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Designation</label>

              <p><?php echo $details['designation']; ?></p>

            </div>


            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Department</label>
              <p><?php echo $details['department']; ?></p>
            </div>
            <div class="mb-2 col-md-4">
              <label class="d-block text-font">Branch</label>

              <p><?php echo $details['branchnew']; ?></p>

            </div>
          </div>
          <?php } ?>
          
        </div>

      </div>
      <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-primary btn-sm text-white" onclick="location.href=''">Back</a>

      </div>
    </div>
  </div>
</div>