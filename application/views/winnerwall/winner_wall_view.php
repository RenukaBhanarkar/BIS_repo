<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Winner Wall View</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top"> 
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Competition</label>
                            <div>
                                <p><?=$masterWinners['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Title</label>
                            <div>
                                <p><?=$masterWinners['wall_title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Date of Competition</label>
                            <div>
                                <p><?=$masterWinners['quiz_date']?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 mt-3 table-responsive">
                            <table id="example" class="table-bordered display nowrap " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Prize</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody id="que_body">
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>winnerwall/winner_wall_list'">Back
                    </a>
                </div>
                 
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
     $(document).ready(function () 
     { 
        displayWall();
     });
function displayWall() {
    var quiz_id="<?= $masterWinners['quiz_id']?>";
    $.post("<?php echo base_url(); ?>winnerwall/viewWallWinner", 
    {
        quiz_id: quiz_id
    }, function(result) 
    {
        if (result.status == 0)
        {
            $('.errorbox').show().text("Error,Please try again.");
        }
        else
        {
            res = JSON.parse(result);
            console.log(res.data)
            data = res.data;
            var row = '';
            j = 0
            for (i in data) 
            {
                j++;
                row += '<tr id="row' + data[i].id + '">' +
                    '<td>' + j + '</td>' +
                    '<td>' + data[i].prize  + '</td>' +
                    '<td>' + data[i].name  + '</td>' +
                    '<td>' + data[i].email + '</td>' +
                    '<td>' + data[i].contact_no + '</td>' +
                    '<td> <img src="../../'+data[i].image +'" style="height:60px;"></td>' +
                    '<td>' + data[i].location + '</td></tr>';
                }
                $("#que_body").html(row);
            }
        });
}

</script>
<!-- End of Main Content -->