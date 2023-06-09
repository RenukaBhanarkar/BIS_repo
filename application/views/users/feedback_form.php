<style>
    .cap-img {
    background-image: url('<?= base_url(); ?>assets/images/captcha-bg.png');
}
.position-relative {
    position: relative!important;
}
.captcha_img {
    width: 70%;
    letter-spacing: 17px;
    font-size: 22px;
    text-align: center;
    /* background-image: url(/HPPERC/resources/assets/img/captcha 1.jpg); */
}
.captcha_button {
    margin-left: 72%;
    margin-top: -33px;
}
.pd-top-1 {
    padding-top: 15px;
}
</style>    
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
                <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="name" id="name" value="" placeholder="Enter Title" minlength="2" maxlength="200" aria-describedby="inputGroupPrepend" required>
                <span class="text-danger" id="err_name"></span>
                
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                <input type="tel" class="form-control input-font" name="mobile_no" id="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                <span class="text-danger" id="err_mobile"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Email<sup class="text-danger">*</sup></label>
                <input type="email" class="form-control input-font" name="email" id="email" placeholder="Enter Email" required>
                <span class="text-danger" id="err_email"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Subject<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="subject" id="subject" placeholder="Enter Subject" minlength="2" maxlength="200" required>
                <span class="text-danger" id="err_subject"></span>
            </div>
            <div class="mb-2 col-md-8">
                <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                <textarea type="text" class="form-control input-font" name="description" id="description" placeholder="Enter Description" required></textarea>
                <span class="text-danger" id="err_description"></span>
            </div>
            <div class="col-md-4 mb-2">
								<div class="form-group">
									<label class="d-block text-font">Captcha<sup class="text-danger">*</sup></label>
										 <div class="captcha_img position-relative cap-img">           
                <span id="captchaDiv">sk8PeK</span>               
                </div>
               <div class="captcha_button">
                <button class="btn btn-primary mar-left-1" type="button" onclick="refreshCaptcha()"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="pd-top-1">									
										<input type="text" id="captchaCode" name="captchaCode" class="form-control" placeholder="Enter Captcha" onkeyup="chkCaptcha('captchaCode');" maxlength="6" fdprocessedid="rw6f4e">
									</div>
									 <span id="captchaCode_error" class="validationError"></span>
								</div>
							</div>
    </div>
    <div class="row">
            <div class="col-md-12 p-3 text-end">
                <button type="submit" onclick="return submitFeedback(event)"  name="submit1" class="btn btn-success" >Submit</button>
                <button class="btn btn-danger cancel" type="button" >Cancel</button>
                <button class="btn btn-warning reset" >Reset</button>
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

        if(description.length==0 || description.length==""){
            $('#err_description').text('This value is required');
            allfield=false;            
        }else if(description.length > 2000){
            $('#err_description').text('Description length should be 2000 characters only');
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
                                Swal.fire('Feedback submitted successfully!', '', 'success')
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

    $('.cancel').on('click',function(){
        Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        window.location.replace('<?php echo base_url().'Users/welcome' ?>');
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    })

    $('.reset').on('click',function(e){
        e.preventDefault();
        Swal.fire({
                    title: 'Are you sure you want to Reset?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Reset',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $('#addFeedback').get(0).reset();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    })
    $(document).ready(function(){
    $("#name").keydown(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 90) && (inputValue != 32 && inputValue != 8 && inputValue!= 9)) { 
            event.preventDefault(); 
        }
    });
});



//});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>