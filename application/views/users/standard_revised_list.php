

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
      
        <div class="row">
        <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Standards Revised</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="col-12 mt-3">
            <div class="card card-body">
                <table id="example" class="table hover table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($getAll as $key => $value) {?>
                                <tr>
                                 <td><?= $key+1?></td>
                                 <td><?= $value['is_title']?></td>
                                 <td><?= $value['depName']?></td>
                                 <td class="border-bottom-0">
                                    

                                     <a href="standard_revised_view/<?= $value['pk_is_id']?>" class="btn btn-primary btn-sm mr-2">View Details</a>
                                <a href="new_work_view_comments/<?= $value['pk_is_id']?>" class="btn btn-success btn-sm mr-2">Join Discussion</a>
                                
                                    
                                 </td>
                                 </tr>
                                  <?php }?>
                                
 
                    </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->
    
    