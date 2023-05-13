<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Set Permission</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/'; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Set Permission</li>
            </ol>
        </nav>
    </div>
    <?php
    if ($this->session->flashdata('MSG')) {
        echo $this->session->flashdata('MSG');
    }
    ?>
    <div id="err_module" class="alert alert-warning" style="display:none"></div>
    <div id="err_submodule" class="alert alert-warning" style="display:none"></div>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card card-body">
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
                    <h4 class="m-0">Profile Information</h4>
                </div>
                <div class="row mt-3">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name</label>
                        <div>
                            <p><?= $user_details['name']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email Id</label>
                        <div>
                            <p><?= $user_details['email_id']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Department</label>
                        <div>
                            <p><?= $user_details['department']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Role</label>
                        <div>
                            <p><?= $user_details['role']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-top card-body">
                <form id="permission_form" method="POST" action="<?php echo base_url(); ?>admin/add_permissions">
                    <table id="hpListTable" class="table table-bordered scroll">
                        <thead>
                            <tr> <!-- <th>Master</th> -->
                                <th>Module</th>
                                <th>Sub-Module</th>
                                <th>View</th>
                                <th>Add</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" id="user_id" name="user_id" value="<?= $user_id; ?>" />
                            <!-- /*
                                    1- QUIZ COMPETITION
                            */-->
                            <!-- *************  QUIZ START ***************** -->
                            <tr>
                                <td rowspan="6">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="mainModule[]" class="custom-control-input" id="163_mainModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="163_mainModuleChk">Quiz Competition</label>
                                    </div>
                                </td>
                                <!-- ************* CREATE QUIZ start ***************** -->
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="173_subModuleChk">Create Quiz</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="createQuiz[]" value="1" class="custom-control-input 163_mainModuleChk 173_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="173_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="createQuiz[]" value="2" class="custom-control-input 163_mainModuleChk 173_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="173_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="createQuiz[]" value="3" class="custom-control-input 163_mainModuleChk 173_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="173_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="createQuiz[]" value="4" class="custom-control-input 163_mainModuleChk 173_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="173_deleteChk"></label>
                                    </div>
                                </td>
                                <!-- ************* CREATE QUIZ END ***************** -->
                            </tr>
                            <!-- ************* CREATE QUIZ END ***************** -->
                            <!-- ************* MANAGE QUIZ START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="174_subModuleChk">Manage Quiz</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageQuiz[]" value="1" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="174_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageQuiz[]" value="2" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="174_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageQuiz[]" value="3" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="174_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageQuiz[]" value="4" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="174_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- ************* MANAGE QUIZ END ***************** -->
                            <!-- ************* ON GOING QUIZ START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="176_subModuleChk">On Going Quiz</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="ongoingQuiz[]" value="1" class="custom-control-input 163_mainModuleChk 176_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="176_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- ************* ON GOING QUIZ END ***************** -->
                            <!-- ************* CLOSED QUIZ START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="177_subModuleChk" id="177_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="177_subModuleChk">Closed Quiz</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="closedQuiz[]" value="1" class="custom-control-input 163_mainModuleChk 177_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="177_subModuleChk" id="177_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="177_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- ************* CLOSED QUIZ END ***************** -->
                            <!-- ************* QUE BANK START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="5" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="178_subModuleChk">Question Bank</label>
                                    </div>
                                </td>

                                <!-- PER STARTS -->
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="queBank[]" value="1" class="custom-control-input 163_mainModuleChk 178_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="178_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="queBank[]" value="2" class="custom-control-input 163_mainModuleChk 178_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="178_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="queBank[]" value="3" class="custom-control-input 163_mainModuleChk 178_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="178_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="queBank[]" value="4" class="custom-control-input 163_mainModuleChk 178_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="178_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- ************* QUE BANK END ***************** -->
                            <!-- ***********  RESULT START **************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="6" name="subModule[]" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="179_subModuleChk">Result Declared</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="result[]" value="1" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="179_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="result[]" value="2" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="179_addChk"></label>
                                    </div>
                                </td>
                                <td> </td>
                                <td> </td>

                            </tr>
                            <!--  **************  RESULT END ********************-->
                            <!-- /*
                                    2- STANDARD WRITING
                            */-->
                            <!-- ************* 7 Create Competition START ***************** -->
                            <tr>
                                <td rowspan="5">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="mainModule[]" class="custom-control-input" id="263_mainModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="263_mainModuleChk">Standard Writting</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="7" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="273_subModuleChk">Create Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="createComp[]" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="createComp[]" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="createComp[]" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="createComp[]" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>


                            <!-- ************* 8 Manage Competition START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="8" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="274_subModuleChk">Manage Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageComp[]" value="1" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="274_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageComp[]" value="2" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="274_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageComp[]" value="3" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="274_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="manageComp[]" value="4" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="274_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>


                            <!-- ************* 9 Ongoing Competition START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="9" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="276_subModuleChk">Ongoing Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="ongoingComp[]" value="1" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="276_viewChk"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- ************* 10 Closed Competition START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="10" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="277_subModuleChk" id="277_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="277_subModuleChk">Closed Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="closedComp[]" value="1" class="custom-control-input 263_mainModuleChk 277_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="277_subModuleChk" id="277_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="277_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>


                            <!-- ************* 11  Review Competition START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="11" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="278_subModuleChk">Review Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="reviewComp[]" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="278_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="reviewComp[]" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="278_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="reviewComp[]" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="278_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="reviewComp[]" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="278_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- ************* Review Competition END ***************** -->
                            <!-- /*
                                    3 - Miscellaneous Competition
                            */-->
                            <!-- ************* 12  Miscellaneous CREATE START ***************** -->
                            <tr>
                                <td rowspan="5">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="mainModule[]" class="custom-control-input" id="264_mainModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="264_mainModuleChk">Miscellaneous Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="12" name="subModule[]" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="373_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="373_subModuleChk">Create Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="misCreateComp[]" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_new_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="misCreateComp[]" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_new_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="misCreateComp[]" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_new_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="misCreateComp[]" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273__newdeleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273__newdeleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- ************* 13  Miscellaneous MANAGE START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="13" name="subModule[]" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="374_subModuleChk">Manage Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="misManageComp[]" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="374_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="misManageComp[]" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="374_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="misManageComp[]" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="374_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="misManageComp[]" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="374_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- ************* 14  Miscellaneous  ONGOING START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="14" name="subModule[]" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="376_subModuleChk">Ongoing Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="misOngoingComp[]" class="custom-control-input 264_mainModuleChk 376_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="376_viewChk"></label>
                                    </div>
                                </td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <!-- *************  15 Miscellaneous CLOSED START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="15" name="subModule[]" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="377_subModuleChk" id="377_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="377_subModuleChk">Closed Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="misClosedComp[]" class="custom-control-input 264_mainModuleChk 377_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="377_subModuleChk" id="377_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="377_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <!-- *************  16  Miscellaneous REVIEW START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="16" name="subModule[]" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="378_subModuleChk">Review Management</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="misReviewComp[]" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="378_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="misReviewComp[]" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="378_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="misReviewComp[]" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="378_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="misReviewComp[]" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="378_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- ************* Miscellaneous Competition END ***************** -->
                            <!-- /*
                                    4 - Wall of wisdom Competition
                            */-->
                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="mainModule[]" class="custom-control-input 266_mainModuleChk" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="181_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="181_subModuleChk">Wall of Wisdom</label>
                                    </div>
                                </td>
                                <td></td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="281_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="281_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="282_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="282_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="283_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="283_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="284_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="284_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- /*
                                    5 - Your Wall
                            */-->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="5" name="mainModule[]"  class="custom-control-input 366_mainModuleChk" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="481_subModuleChk">Your Wall</label>
                                    </div>
                                </td>
                                <td></td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="yourWall[]" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="481_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="yourWall[]"  class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="482_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="482_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="yourWall[]"  class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="483_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="483_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="yourWall[]"  class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="484_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="484_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- /*
                                    6 - Classroom
                            */-->
                             <!-- *************  17 classroom create START ***************** -->
                            <tr>
                                <td rowspan="4">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="6" name="mainModule[]"  class="custom-control-input" id="64_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="64_mainModuleChk">Classroom</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="17" name="subModule[]" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="73_subModuleChk">Create Post</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="createClassroomPost[]" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="73_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="createClassroomPost[]"  class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="73_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="createClassroomPost[]" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="73_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="createClassroomPost[]" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="73_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                              <!-- *************  18 classroom Manage START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="18" name="subModule[]" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="74_subModuleChk">Manage Post</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="manageClassroomPost[]" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="74_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="2" name="manageClassroomPost[]" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="74_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="manageClassroomPost[]" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="74_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="manageClassroomPost[]" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="74_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                              <!-- *************  19 classroom publish START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="19" name="subModule[]" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="76_subModuleChk">Published Post</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="publishClassroomPost[]" class="custom-control-input 64_mainModuleChk 76_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="76_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                                  <!-- *************  20 classroom archived START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="20" name="subModule[]" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="77_subModuleChk" id="77_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="77_subModuleChk">Archived Post</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="archiveClassroomPost[]" class="custom-control-input 64_mainModuleChk 77_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="77_subModuleChk" id="77_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="77_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- /*
                                    7 - By the Mentors
                            */-->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="7" name="mainModule[]" class="custom-control-input 6_mainModuleChk" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="1_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="1_subModuleChk">By the Mentors</label>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="byTheMentors[]" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="1_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="1_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="byTheMentors[]"class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="2_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="2_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="byTheMentors[]"class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="3_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="3_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="byTheMentors[]" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="4_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="4_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>
                            <!-- /*
                                    8 - CMS
                            */-->
                             <!-- *************  21 banner START ***************** -->
                            <tr>
                                <td rowspan="8">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="8" name="mainModule[]"  class="custom-control-input" id="7_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="7_mainModuleChk">CMS</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="21" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="2_subModuleChk">Banner Image</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="bannerImage[]" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="2_new_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="bannerImage[]"class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="2_new_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="bannerImage[]"class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="2_new_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="bannerImage[]" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="2_new_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>
                             <!-- *************  22 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="22" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="3_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="3_subModuleChk">About Exchange forum</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="exchangeForum[]"  class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="3_new_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="3_new_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="exchangeForum[]"class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="4_new_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="4_new_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="exchangeForum[]"class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="5_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="5_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="exchangeForum[]"  class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="6_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="6_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>
                             <!-- *************  23 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="23" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="4_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="4_subModuleChk">Contact Us</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="contactUs[]"  class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="7_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="7_viewChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="contactUs[]" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="8_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="8_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="contactUs[]" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="9_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="9_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="contactUs[]" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="10_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="10_deleteChk"></label>
                                    </div>
                                </td>







                            </tr>
                             <!-- *************  24 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="24" name="subModule[]"class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="6_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="6_subModuleChk">Footer Links</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="footerLinks[]"  class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="11_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="11_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="footerLinks[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="12_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="12_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="footerLinks[]"class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="13_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="13_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="footerLinks[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="14_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="14_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>
                             <!-- *************  25 classroom archived START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"value="25" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="7_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="7_subModuleChk">Gallery</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="gallery[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="15_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="15_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="2" name="gallery[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="16_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="16_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="gallery[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="17_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="17_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="gallery[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="18_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="18_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                             <!-- *************  26 classroom archived START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="26" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="8_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="8_subModuleChk">Feedback</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="feedback[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="19_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="19_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="feedback[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="20_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="20_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="feedback[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="21_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="21_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="feedback[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="22_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="22_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                             <!-- *************  27 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="27" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="9_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="9_subModuleChk">Latest News</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="latestNews[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="23_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="23_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="2" name="latestNews[]"class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="24_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="24_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="latestNews[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="25_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="25_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="latestNews[]" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="26_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="26_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                             <!-- *************  28 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="28" name="subModule[]" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="10_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="10_subModuleChk">Upcoming Events</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="UpcomingEvents[]"  class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="27_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="27_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="UpcomingEvents[]"  class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="28_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="28_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="UpcomingEvents[]"  class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="29_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="29_updateChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="UpcomingEvents[]"  class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="30_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="30_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- /*
                                    9 - Winners Wall
                            */-->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="9" name="mainModule[]"  class="custom-control-input" id="8_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="8_mainModuleChk">Winners Wall</label>
                                    </div>
                                </td>


                                <td></td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="winnersWall[]"  class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="31_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="31_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="winnersWall[]"class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="32_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="32_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="winnersWall[]"class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="33_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="33_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="winnersWall[]"class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="34_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="34_viewChk"></label>
                                    </div>
                                </td>








                            </tr>

                            <!-- /*
                                    10 - Share your thoughts
                            */-->
                            
                            <tr>
                                <td rowspan="6">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="10" name="mainModule[]"  class="custom-control-input" id="9_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="9_mainModuleChk">Share your thoughts</label>
                                    </div>
                                </td>

                                <!-- *************  29 new work item START ***************** -->
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="29" name="subModule[]"class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="12_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="12_subModuleChk">New Work item Proposal</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="newWork[]" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="35_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="35_viewChk"></label>
                                    </div>
                                </td>


                                <td> </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="newWork[]" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="37_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="37_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="newWork[]" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="38_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="38_viewChk"></label>
                                    </div>
                                </td>
                            </tr>

                             <!-- *************  30 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="30" name="subModule[]"class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="13_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="13_subModuleChk">Important Draft Standards</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="draft[]" class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="39_viewChk" onclick="checkAccess(this);" value="74#View" >
                                        <label class="custom-control-label" for="39_viewChk"></label>
                                    </div>
                                </td>



                                <td>  </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="draft[]"class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="41_updateChk" onclick="checkAccess(this);" value="74#Update" >
                                        <label class="custom-control-label" for="41_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="draft[]"class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="42_deleteChk" onclick="checkAccess(this);" value="74#Delete" >
                                        <label class="custom-control-label" for="42_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                             <!-- *************  31 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="31" name="subModule[]" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="14_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="14_subModuleChk">New Standards Published</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="newStd[]"class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="43_viewChk" onclick="checkAccess(this);" value="76#View" >
                                        <label class="custom-control-label" for="43_viewChk"></label>
                                    </div>
                                </td>



                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="newStd[]" class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="45_updateChk" onclick="checkAccess(this);" value="76#Update" >
                                        <label class="custom-control-label" for="45_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="newStd[]"class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="46_deleteChk" onclick="checkAccess(this);" value="76#Delete" >
                                        <label class="custom-control-label" for="46_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>
                             <!-- *************  32 classroom archived START ***************** -->

                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="32" name="subModule[]" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="15_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="15_subModuleChk">Standards Under Review</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="stdReview[]"class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="47_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="47_viewChk"></label>
                                    </div>
                                </td>


                                <td> </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="3" name="stdReview[]"class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="49_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="49_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="stdReview[]"class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="50_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="50_deleteChk"></label>
                                    </div>
                                </td>








                            </tr>
                             <!-- *************  33 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="33" name="subModule[]"class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="16_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="16_subModuleChk">Revised Standards</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="revisedStd[]"class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="51_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="51_viewChk"></label>
                                    </div>
                                </td>


                                <td> </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"value="3" name="revisedStd[]" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="53_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="53_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"value="4" name="revisedStd[]" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="54_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="54_deleteChk"></label>
                                    </div>
                                </td>








                            </tr>
                             <!-- *************  34 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="34" name="subModule[]"class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="17_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="17_subModuleChk">Discussion Forum</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="disForum[]" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="55_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="55_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="disForum[]" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="56_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="56_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="disForum[]" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="57_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="57_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="disForum[]" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="58_deleteChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="58_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- /*
                                    11 - Join the Class Room
                            */-->
                            <tr>
                                <td rowspan="4">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="11" name="mainModule[]"  class="custom-control-input" id="10_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="10_mainModuleChk">Join the Class Room</label>
                                    </div>
                                </td>

                                 <!-- *************  35 classroom archived START ***************** -->
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="35" name="subModule[]"class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="18_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="18_subModuleChk">Create new post/ live session</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="liveSession[]"class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="59_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="59_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="liveSession[]"class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="60_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="60_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="liveSession[]"class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="61_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="61_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"value="4" name="liveSession[]" class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="62_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="62_deleteChk"></label>
                                    </div>
                                </td>








                            </tr>

                             <!-- *************  36 classroom archived START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="36" name="subModule[]" class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="19_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="19_subModuleChk">Manage session/Post</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="manageSession[]"class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="63_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="63_viewChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="2" name="manageSession[]"  class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="64_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="64_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="manageSession[]" class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="65_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="65_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="manageSession[]"class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="66_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="66_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>

                            <!-- *************  37 Published Posts START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="37" name="subModule[]"class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="20_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="20_subModuleChk">Published Posts</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="publishedPost[]"class="custom-control-input 10_mainModuleChk 20_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="67_viewChk" onclick="checkAccess(this);" value="76#View" >
                                        <label class="custom-control-label" for="67_viewChk"></label>
                                    </div>
                                </td>
                                <td>  </td>
                                 <td> </td>
                                <td> </td>

                            </tr>

                             <!-- *************  38 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="38" name="subModule[]"class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="21_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="21_subModuleChk">Archived Posts</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="archivedPost[]"class="custom-control-input 10_mainModuleChk 21_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="71_viewChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="71_viewChk"></label>
                                    </div>
                                </td>


                                <td>  </td><td>  </td><td>  </td>
                            </tr>
                            <!-- /*
                                    12 - In Conversation with Expert
                            */-->
                            <tr>
                                <td rowspan="2">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="12" name="mainModule[]"  class="custom-control-input" id="11_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="11_mainModuleChk">In Conversation with Expert</label>
                                    </div>
                                </td>
                                 <!-- *************  39 classroom archived START ***************** -->

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="39" name="subModule[]"class="custom-control-input 11_mainModuleChk" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="22_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="22_subModuleChk">In Conversation with Expert</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="conExpert[]"class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="75_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="75_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="conExpert[]" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="76_new_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="76_new_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="conExpert[]" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="77_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="77_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="conExpert[]" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="78_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="78_deleteChk"></label>
                                    </div>
                                </td>








                            </tr>

                             <!-- *************  40 classroom archived START ***************** -->
                            <tr>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="40" name="subModule[]" class="custom-control-input 11_mainModuleChk" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="23_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="23_subModuleChk">In Conversation with Expert Archives</label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="conArchive[]" class="custom-control-input 11_mainModuleChk 23_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="79_viewChk" onclick="checkAccess(this);" value="74#View" >
                                        <label class="custom-control-label" for="79_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>  <td> </td> <td> </td>
                            </tr>
                            <!-- /*
                                    13 - Banner Image world of standard
                            */-->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="13" name="mainModule[]"  class="custom-control-input" id="12_mainModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="12_mainModuleChk">Banner Image world of standard</label>
                                    </div>
                                </td>
                                <td></td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1" name="worldOfStd[]"class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="83_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="83_viewChk"></label>
                                    </div>
                                </td>


                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2" name="worldOfStd[]" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="84_addChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="84_addChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3" name="worldOfStd[]" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="85_updateChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="85_updateChk"></label>
                                    </div>
                                </td>



                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4" name="worldOfStd[]" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="86_deleteChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="86_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="col-md-12 submit_btn p-3">
                        <!-- <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> -->
                        <input type="submit" name="Submit" id="addPermissionsBtn" class="btn btn-info btn-sm">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>admin/cmsManagenent_dashboard'">Back</a>
</div>
</div>
<script>
    $(document).ready(function() {
        $('input[type=checkbox]').removeAttr('checked');


        $('#permission_form').on('click', '#addPermissionsBtn', function(e) {
            e.preventDefault();
            var focusSet = false;
            var allfields = true;
            var mainModule = $('input[name="mainModule[]"]:checked').val();
            var subModule = $('input[name="subModule[]"]:checked').val();

            if (mainModule == "" || mainModule == undefined || mainModule == null) {
                if ($("#err_module").next(".validation").length == 0) {
                    $("#err_module").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select atleast one main module </div>");
                }
                Swal.fire("Please select atleast one main module");
                allfields = false;
            } else {
                $("#err_module").next(".validation").remove();
            }
            if (subModule == "" || subModule == undefined || subModule == null) {
                if ($("#err_submodule").next(".validation").length == 0) {
                    $("#err_submodule").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select atleast one sub module </div>");
                }
                Swal.fire("Please select atleast one sub module");
                allfields = false;
            } else {
                $("#err_submodule").next(".validation").remove();
            }
            if (allfields) {
                // var mainModule = [];
                // $.each($("input[name='mainModule']:checked"), function(){
                //     mainModule.push($(this).val());
                // });
                // //alert("Selected mainModule are: " + mainModule.join(", "));
                // var subModule = [];
                // $.each($("input[name='subModule']:checked"), function(){
                //     subModule.push($(this).val());
                // });
                // //alert("Selected subModule are: " + subModule.join(", "));
                var url = $('#permission_form').attr('action');
                var userForm = document.getElementById("permission_form");
                var fd = new FormData(userForm);

                Swal.fire({
                    title: 'Are you sure you want to set permission ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Yes',
                    denyButtonText: `Cancel`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        
                        jQuery.ajax({
                            type: "POST",
                            url: url,
                            dataType: 'json',
                            data: fd,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                if (res.status == 0) {
                                    // alert(res.message);
                                    Swal.fire(res.message);

                                } else {
                                    // alert(res.message);
                                    Swal.fire(res.message);
                                    window.location.replace('<?php echo base_url() . 'subadmin/admin_creation_list' ?>');
                                }
                            },
                            error: function(xhr, status, error) {
                                //toastr.error('Failed to add '+xData.name+' in wishlist.');
                                console.log(error);
                            }
                        });
                        // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                })


            } else {
                return false;
            }
        });

    });

    function checkSubmodules(module) {
        var moduleId = $(module).attr('id');
        // alert(moduleId);
        // alert($(module).data('moduleid'));
        var mainModuleId = $(module).data('moduleid');
        // alert(mainModuleId);


        if (module.checked) {

            $('.' + moduleId).each(function() {
                this.checked = true;
                checkAllAccess(this);
            });
            $('#' + mainModuleId).prop('checked', true);

        } else {
            //alert($('.'+mainModuleId+':checkbox:checked').length);

            $('.' + moduleId).each(function() {
                this.checked = false;
                checkAllAccess(this);
            });

            if ($('.' + mainModuleId + ':checkbox:checked').length == 0) {

                $('#' + mainModuleId).prop('checked', false);
            }
        }

    }

    function checkAllAccess(module) {
        var moduleId = $(module).attr('id')
        if (module.checked) {
            $('.' + moduleId).each(function() {
                this.checked = true;
            });
        } else {
            $('.' + moduleId).each(function() {
                this.checked = false;
            });
        }

    }

    function checkAccess(module) {
        var mainModuleId = $(module).data('moduleid');
        var subModuleId = $(module).data('submoduleid');
        if (module.checked) {
            $('#' + mainModuleId).prop('checked', true);
            $('#' + subModuleId).prop('checked', true);
        } else {

            //1_mainModuleChk 27_subModuleChk

            //if($('.'+mainModuleId+':checkbox:checked').length==0)

            if ($('.' + subModuleId + ':checkbox:checked').length == 0) {
                $('#' + subModuleId).prop('checked', false);
                if ($('.' + mainModuleId + ':checkbox:checked').length == 0) {
                    $('#' + mainModuleId).prop('checked', false);
                }


            }



        }

    }
</script>