    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz Archive</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/manage_quiz_list';?>" >Manage Quiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz Archive</li>
                
                </ol>
            </nav>
      </div>

      <div class="row">
        <div class="col-12 mt-3">
          <div class="card border-top card-body table-responsive">
            <table id="listView"  class="table-bordered display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Quiz ID</th>
                  <th>Quiz Title</th>
                  <th>Quiz Start Date</th>
                  <th>Quiz End Date</th>
                  <th>Total Questions in Quiz</th>
                  <th>Total Questions in QB</th>
                  <th>Total Marks</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($allRecords)) {
                  $i = 1;
                  foreach ($allRecords as $quiz) { ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $quiz['quiz_id'] ?></td>
                      <td><?= $quiz['title'] ?></td>
                      <td><?= date("d-m-Y", strtotime($quiz['start_date'])); ?></td>
                      <td><?= date("d-m-Y", strtotime($quiz['end_date'])); ?></td>
                      <td><?= $quiz['total_question'] ?></td>
                      <td><?= $quiz['qbquestion'] ?></td>
                      <td><?= $quiz['total_mark'] ?></td>
                      <td><?= $quiz['status_name'] ?></td>
                      <td class="d-flex border-bottom-0">

                        <a href="quiz_view/<?= $quiz['id'] ?>" class="btn btn-primary btn-sm mr-2">View</a>
                        <button type="button" class="btn btn-info btn-sm mr-2" data-id="<?= $quiz['quiz_id'] ?>" id="RestoreQuiz">Restore</button>   
                       

                      </td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Modal -->
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Create?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <script>
      $(document).ready(function() {
        $('#listView').DataTable({
        // scrollX: true,
    });
        $('#listView').on('click', '#RestoreQuiz', function(e) {
          e.preventDefault();
          const $root = $(this);
          var id = $root.data('id');
          jQuery.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>quiz/changeStatus',
            dataType: 'json',
            data: {
              "id": id,
              "status": 1
            },
            success: function(res) {
              if (res.status == 0) {
                alert(res.message);

              } else {
                alert(res.message);
                window.location.replace("<?php echo base_url(); ?>quiz/quiz_list");
              }
            },
            error: function(xhr, status, error) {
              //toastr.error('Failed to add '+xData.name+' in wishlist.');
              console.log(error);
            }
          });

        });
      });
    </script>