
<div class="container">
<div class="feedback_content">
<?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
<form action="<?php echo base_url(); ?>users/add_feedback_form_data" name="addfeedback" id="addFeedback" method="post" class="">

<div class="bloginfo">
    
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Feedback Form</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
    <div class="row">
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Name</label>
                <input type="text" class="form-control input-font" name="name" id="name" value="" placeholder="Enter Title" minlength="2" maxlength="200" aria-describedby="inputGroupPrepend" required>
                <span class="text-danger" id="err_name"></span>
                
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Mobile Number</label>
                <input type="tel" class="form-control input-font" name="mobile_no" id="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" placeholder="Enter Mobile Number" required="">
                <span class="text-danger" id="err_mobile"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Email</label>
                <input type="email" class="form-control input-font" name="email" id="email" placeholder="Enter Email" required>
                <span class="text-danger" id="err_email"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Subject</label>
                <input type="text" class="form-control input-font" name="subject" id="subject" placeholder="Enter Subject" minlength="2" maxlength="200" required>
                <span class="text-danger" id="err_subject"></span>
            </div>
            <div class="mb-2 col-md-8">
                <label class="d-block text-font">Description</label>
                <textarea type="text" class="form-control input-font" name="description" id="description" placeholder="Enter Description" required></textarea>
                <span class="text-danger" id="err_description"></span>
            </div>
    </div>
    <div class="row">
            <div class="col-md-12 p-3 text-end">
                <button type="submit" onclick="return submitFeedback(event)"  name="submit1" class="btn btn-success" >Submit</button>
                <button class="btn btn-danger" type="button" onclick="location.href='#'">Cancel</button>
                <button class="btn btn-warning" type="reset">Reset</button>
            </div>
    </div>
    </form>
    </div>
</div>
<script type="text/javascript">  
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

    function submitFeedback(event){
        event.preventDefault();
        $('#addFeedback').addClass('was-validated');
        allfield=true;
        var name=$('#name').val();
        var email=$('#email').val();
        var mobile=$('#mobile_no').val();
        var subject=$('#subject').val();
        var description=$('#description').val();
        var numbers = /[0-9]/g;
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if(name=="" || name==null){
            $('#err_name').text('This value is required');
            allfield=false;
        }else{
            $('#err_name').text('');
           
        }

        if(mobile=="" || mobile==null){
            console.log(mobile);
            $('#err_mobile').text('This value is required');
            allfield=false;
        }else if(mobile.length < 10 || mobile.length > 10){
            console.log(mobile);
            $('#err_mobile').text('Enter Valid Mobile Number');
            allfield=false;
        }else if(!(mobile.match(numbers))){
            $('#err_mobile').text('Enter Valid Mobile Number');
            allfield=false;
        }else{
            $('#err_mobile').text('');         
        }

        if(email=="" || email==null){
            $('#err_email').text('This value is required');
            allfield=false;
        }else if(!(email.match(validRegex))){
            $('#err_email').text('Enter valid Email');
            allfield=false;
        }else{
            $('#err_email').text('');
           
        }

        if(subject=="" || subject==null){
            $('#err_subject').text('This value is required');
            allfield=false;
        }else{
            $('#err_subject').text('');
           
        }

        if(description=="" || description==null){
            $('#err_description').text('This value is required');
            allfield=false;
        }else{
            $('#err_description').text('');
           
        }



        if(allfield){
            Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#addFeedback').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })
        }else{
            return false;          
        }
    }

//});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>