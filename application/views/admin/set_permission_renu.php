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
                            <p>Anis Mulani</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email Id</label>
                        <div>
                            <p>anismulani@gmail.com</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Department</label>
                        <div>
                            <p>IDSD Department</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Role</label>
                        <div>
                            <p>IDSD Department</p>
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
                            <!-- ************* CREATE QUIZ START ***************** -->
                            <tr>
                                <td rowspan="6">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="mainModule[]" class="custom-control-input" id="163_mainModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="163_mainModuleChk">Quiz Competition</label>
                                    </div>
                                </td>

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
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="result[]" value="3" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="179_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="result[]" value="4" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="179_deleteChk"></label>
                                    </div>
                                </td>

                            </tr>
                            <!--  **************  RESULT END ********************-->
                            <!-- /*
                                    2- STANDARD WRITING
                            */-->
                            <!-- *************  Create Competition START ***************** -->
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
                                        <input type="checkbox" name="createComp[]" value="1" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="273_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <!-- *************  Create Competition END ***************** -->
                            <!-- *************  Manage Competition START ***************** -->
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
                            <!-- *************  Manage Competition END ***************** -->

                            <!-- *************  Ongoing CompetitionSTART ***************** -->
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
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="ongoingComp[]" value="2" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_addChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="276_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="ongoingComp[]" value="3" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_updateChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="276_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="ongoingComp[]" value="4" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_deleteChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="276_deleteChk"></label>
                                    </div>
                                </td>
                            </tr>

                            <!-- *************  Ongoing CompetitionEND ***************** -->

                            <!-- *************  Closed Competition START ***************** -->
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

                            <!-- *************  Closed Competition END ***************** -->
                            <!-- *************  Review Competition START ***************** -->
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="11" name="subModule[]" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_subModuleChk" onclick="checkSubmodules(this);">
                                        <label class="custom-control-label" for="278_subModuleChk">Review Competition</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" name="reviewComp[]" value="1" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_viewChk" onclick="checkAccess(this);">
                                        <label class="custom-control-label" for="278_viewChk"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <!-- ************* Review Competition END ***************** -->
                            <!-- /*
                                    3 - Miscellaneous Competition
                            */-->
                            <!-- *************  CREATE START ***************** -->
                            <!-- *************  END ***************** -->
                            <!-- ************* MANAGE START ***************** -->
                            <!-- *************  END ***************** -->
                            <!-- *************  ONGOING START ***************** -->
                            <!-- *************  END ***************** -->
                            <!-- *************  CLOSED START ***************** -->
                            <!-- *************  END ***************** -->
                            <!-- *************  REVIEW START ***************** -->
                            <!-- *************  END ***************** -->

                            <!-- ************* Miscellaneous Competition END ***************** -->
                            <!-- /*
                                    4 - Wall of wisdom Competition
                            */-->
                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="4" name="mainModule[]"  class="custom-control-input 266_mainModuleChk" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="181_subModuleChk" onclick="checkSubmodules(this);" >
                                        <label class="custom-control-label" for="181_subModuleChk">Wall of Wisdom</label>
                                    </div>
                                </td>
                                <td></td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox"  value="1"  name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="281_viewChk" onclick="checkAccess(this);" >
                                        <label class="custom-control-label" for="281_viewChk"></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="2"  name="wallOfWisdom[]"  class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="282_addChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="282_addChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="3"  name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="283_updateChk" onclick="checkAccess(this);"  >
                                        <label class="custom-control-label" for="283_updateChk"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="4"  name="wallOfWisdom[]" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="284_deleteChk" onclick="checkAccess(this);"  >
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
									<input type="checkbox" class="custom-control-input 366_mainModuleChk" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="481_subModuleChk">Your Wall</label>
								</div>
							</td>





							<td></td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_viewChk" onclick="checkAccess(this);" value="481#View" checked="">
									<label class="custom-control-label" for="481_viewChk"></label>
								</div>
							</td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="482_addChk" onclick="checkAccess(this);" value="482#Add" checked="">
									<label class="custom-control-label" for="482_addChk"></label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="483_updateChk" onclick="checkAccess(this);" value="483#Update" checked="">
									<label class="custom-control-label" for="483_updateChk"></label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="484_deleteChk" onclick="checkAccess(this);" value="484#Delete" checked="">
									<label class="custom-control-label" for="484_deleteChk"></label>
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
                allfields = false;
            } else {
                $("#err_module").next(".validation").remove();
            }
            if (subModule == "" || subModule == undefined || subModule == null) {
                if ($("#err_submodule").next(".validation").length == 0) {
                    $("#err_submodule").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select atleast one sub module </div>");
                }

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
                        alert("YES");
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
                                    var form = document.getElementById("que_bank_form");
                                    var elements = form.elements;
                                    for (var i = 0, len = elements.length; i < len; ++i) {
                                        elements[i].readOnly = true;
                                    }
                                    var language = $('input[name="language"]:checked').val();

                                    $("#que_language").val(language);
                                    $('input[name="language"]').attr('disabled', 'disabled');
                                    $('#que_bank_id').val(res.id);
                                    $('#questions_form').show();
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