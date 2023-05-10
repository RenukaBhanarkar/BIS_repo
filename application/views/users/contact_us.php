<style>
    .card{
        width: 100%;
    }
</style>

<section id="contact">
        <div class="container mt-5">
            <h3 class="text-center text-uppercase">Contact us</h3>


            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 my-5">
                            <div class="card border-1 contact_box">
                                <div class="card-body text-center">
                                    <i class="fa fa-phone icons_contact" aria-hidden="true"></i>
                                    <h4 class="text-uppercase sub_title">Contact Number</h4>
                                    <!-- <p>+8801683615582,+8801750603409</p> -->
                                    <p><?php echo $contact['contact_no'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-5">
                            <div class="card border-1 contact_box">
                                <div class="card-body text-center ">
                                    <i class="fa fa-map-marker mb-2 icons_contact" aria-hidden="true"></i>
                                    <h4 class="text-uppercase sub_title">Address</h4>
                                    <!-- <address>Bureau of Indian Standards, A 20&21, Institutional Area, Sector 62, NOIDA 201309</address> -->
                                    <address><?php echo $contact['address']; ?></address>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                            <div class="card border-1 contact_box">
                                <div class="card-body text-center">
                                    <i class="fa fa-fax  icons_contact" aria-hidden="true"></i>
                                    <h4 class="text-uppercase sub_title">Tele Fax</h4>
                                    <!-- <address>011-2323 0131/3375</address> -->
                                    <address><?php echo $contact['tele_fax']; ?></address>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                            <div class="card border-1 contact_box">
                                <div class="card-body text-center">
                                    <i class="fa fa-globe icons_contact" aria-hidden="true"></i>
                                    <h4 class="text-uppercase sub_title">Email</h4>
                                    <p><?php echo $contact['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
                    <div class="mapouter shadow-sm">
                        <div class="gmap_canvas"><iframe width="100%" height="97%" id="gmap_canvas" src="https://maps.google.com/maps?q=bis delhi&t=&z=10&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 97%;
                                    width: 100%;
                                }
                            </style>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none!important;
                                    height: 97%;
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>

                </div>
            </div>
    </section>