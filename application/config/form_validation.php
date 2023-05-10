<?php
$config = array(
	'quiz_form_validation_rule' => array(
		array(
			'field' => 'title',
			'label' => 'Title of Quiz',
			'rules' => 'required'
		),
		array(
			'field' => 'title_hindi',
			'label' => 'Hindi Title of Quiz',
			'rules' => 'required'
		),
		array( 
			'field' => 'description',
			'label' => 'Description of Quiz',
			'rules' => 'required'
		),
		array(
			'field' => 'terms_conditions',
			'label' => 'Tearms and Conditions of Quiz',
			'rules' => 'required'
		),
		array(
			'field' => 'duration',
			'label' => 'Quiz Duratio',
			'rules' => 'required'
		),
		array(
			'field' => 'total_question',
			'label' => 'Total Number of Questions',
			'rules' => 'required'
		),
		array(
			'field' => 'total_mark',
			'label' => 'Total Marks',
			'rules' => 'required'
		),
		array(
			'field' => 'start_date',
			'label' => 'Start Date',
			'rules' => 'required'
		),
		array(
			'field' => 'start_time',
			'label' => 'Start Time',
			'rules' => 'required'
		),
		array(
			'field' => 'end_date',
			'label' => 'End Date',
			'rules' => 'required'
		),
		array(
			'field' => 'end_time',
			'label' => 'End Time',
			'rules' => 'required'
		),
		array(
			'field' => 'quiz_level_id',
			'label' => 'Level of Quiz',
			'rules' => 'required'
		),		 
		array(
			'field' => 'language_id',
			'label' => 'Launguage of Quiz',
			'rules' => 'required'
		),
		array(
			'field' => 'fprize',
			'label' => 'Number of Prizes',
			'rules' => 'required'
		),
		array(
			'field' => 'fdetails',
			'label' => 'Prize Details',
			'rules' => 'required'
		),
		
		
		array(
			'field' => 'availability_id',
			'label' => 'Available for',
			'rules' => 'required'
		),
		 array(
			'field' => 'que_bank_id',
			'label' => 'Select Question',
			'rules' => 'required'
		),
		
),
		'conversation_form' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
		),
		array( 
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required'
		),
	),

		'live_session_form' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
		),
		array( 
			'field' => 'description',
			'label' => 'Description ',
			'rules' => 'required'
		),
		array( 
			'field' => 'type_of_post',
			'label' => 'type of post',
			'rules' => 'required'
		),
	),

		'lsv_standards_form' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
		),
		array( 
			'field' => 'description',
			'label' => 'Description ',
			'rules' => 'required'
		),
		array( 
			'field' => 'type_of_post',
			'label' => 'type of post',
			'rules' => 'required'
		),
	),

		'winner_wall_form' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array( 
			'field' => 'email',
			'label' => 'Email ',
			'rules' => 'required'
		),
		array( 
			'field' => 'contact_no',
			'label' => 'Contact',
			'rules' => 'required'
		),
	),

		'new_work_view_comments' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
		),
		 'important_draft_comments' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
	),

	'standard_publish_comments' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
	),
	'standard_revised_comments' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
	),

	'standard_under_comments' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
	),

	'create_discussion_form' => array(
		array(
			'field' => 'title',
			'label' => 'title',
			'rules' => 'required'
		),
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
		array(
			'field' => 'start_date',
			'label' => 'start date',
			'rules' => 'required'
		),
		array(
			'field' => 'end_date',
			'label' => 'end date',
			'rules' => 'required'
		),
	),
	'discussion_forum_view' => array(
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'required'
		),
	),
);