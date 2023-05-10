<div id="privacy-content" class="container">
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">By The Mentors</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
             <?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
            <form action="<?php echo base_url().'users/add_btm'?>" method="post" enctype="multipart/form-data">
            <div class="row">
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="text" class="form-control input-font" name="title" id="" placeholder="Enter Title">
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="image" id="Image" >
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Document</label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="document" id="">
                              </div>
                  </div>
                  <div class="mb-3 col-md-12">
                          <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                          <textarea class="form-control input-font" name="description" id="#"></textarea>
                              
                  </div>
                  <div class="mb-3 col-md-12">
                       <div class="mentor_submit">
                          <button type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                       </div> 
                  </div> 
             </div> 
            </form>
         </div>
    </div>
  </div>
