
<?php
                                                            //  echo json_encode($r);
                                                            //  echo var_dump($r['opt1_e']);
                                                            //  echo var_dump($r['opt2_e']);
                                                            // exit();
                                                           $op1 = $op2 = $op3 = $op4 = $op5 = "NA";
                                                           $op1_h = $op2_h = $op3_h = $op4_h = $op5_h = "NA";
                                                            if ($r['language'] == 1 || $r['language'] == 3) {
                                                                if ($r['no_of_options'] == 2 || $r['no_of_options'] == 3 || $r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt1_e'] != "" ) {
                                                                        $op1 = $r['opt1_e'];
                                                                     
                                                                    } else {
                                                                        $op1_img = $r['option1_image'];
                                                                        $op1 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op1_img + '">';
                                                                    }
                                                                    if ($r['opt2_e'] != "" ) {
                                                                        $op2 = $r['opt2_e'];
                                                                       
                                                                    } else {
                                                                        $op2_img = $r['option2_image'];
                                                                        $op2 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op2_img + '">';
                                                                       

                                                                    }
                                                                }
                                                               /* if ($r['no_of_options'] == 3 || $r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt3_e'] != "" ) {
                                                                        $op3 = $r['opt3_e'];
                                                                    } else {
                                                                        $op3_img = $r['option3_image'];
                                                                        $op3 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op3_img + '">';
                                                                       
                                                                        
                                                                    }
                                                                }
                                                                if ($r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt4_e'] != "" ) {
                                                                        $op4 = $r['opt4_e'];
                                                                    } else {
                                                                        $op4_img = $r['option4_image'];
                                                                        $op4 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op4_img + '">';
                                                                    }
                                                                }
                                                                if ($r['no_of_options'] == 5) {
                                                                    if ($r['opt5_e'] != "" ) {
                                                                        $op5 = $r['opt5_e'];
                                                                    } else {
                                                                        $op5_img = $r['option5_image'];
                                                                        $op5 = '<img width="010" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op5_img + '">';
                                                                    }
                                                                }*/
                                                            }
                                                            if ($r['language'] == 2 || $r['language'] == 3) {
                                                                if ($r['no_of_options'] == 2 || $r['no_of_options'] == 3 || $r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt1_h'] != "" ) {
                                                                        $op1_h = $r['opt1_h'];
                                                                     
                                                                    } else {
                                                                        $op1_h_img = $r['option1_h_image'];
                                                                        $op1_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op1_h_img + '">';
                                                                        
                                                                    }
                                                                    if ($r['opt2_h'] != "" ) {
                                                                        $op2_h = $r['opt2_h'];
                                                                       
                                                                    } else {
                                                                        $op2_h_img = $r['option2_h_image'];
                                                                        $op2_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op2_h_img + '">';
                                                                      
                                                                    }
                                                                }
                                                              /*  if ($r['no_of_options'] == 3 || $r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt3_h'] != "" ) {
                                                                        $op3_h = $r['opt3_h'];
                                                                    } else {
                                                                        $op3_h_img = $r['option3_h_image'];
                                                                        $op3_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op3_h_img + '">';
                                                                    }
                                                                }
                                                                if ($r['no_of_options'] == 4 || $r['no_of_options'] == 5) {
                                                                    if ($r['opt4_h'] != "" ) {
                                                                        $op4_h = $r['opt4_h'];
                                                                    } else {
                                                                        $op4_h_img = $r['option4_h_image'];
                                                                        $op4_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op4_h_img + '">';
                                                                    }
                                                                }
                                                                if ($r['no_of_options'] == 5) {
                                                                    if ($r['opt5_h'] != "" ) {
                                                                        $op5_h = $r['opt5_h'];
                                                                    } else {
                                                                        $op5_h_img = $r['option5_h_image'];
                                                                        $op5_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + $r['que_bank_id'] + '/' + $op5_h_img + '">';
                                                                    }
                                                                }*/
                                                            }
                                                            ?>
                                                           
                                                          
                                                            <td>
                                                                <?php
                                                                if ($r['language'] == 1 || $r['language'] == 2) {
                                                                    echo "1. " . $op1 . '<br>2. ' . $op2 . '<br>3. ' . $op3 . '<br>4. ' . $op4 . '<br>5. ' . $op5;
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($r['language'] == 2 || $r['language'] == 3) {
                                                                    echo "1. " . $op1_h . '<br>2. ' . $op2_h . '<br>3. ' . $op3_h . '<br>4. ' . $op4_h . '<br>5. ' . $op5_h; ?>
                                                                <?php } ?>
                                                            </td>
                                                          