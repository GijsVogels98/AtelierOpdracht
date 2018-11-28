<?php 
	$this->load->library('email');
				
	$config = array(
		'mailtype' => 'html',
	);
				
	$this->email->initialize($config);
		
	$this->email->from('noreply@stefverstraten.nl', 'Atelier Sintlucas');
	$this->email->to('s.verstraten@sintlucasedu.nl');
	
	$this->email->subject('Aanvraag atelier');
	$this->email->message('dit is een mooie cron test');
	
	$this->email->send();
	
	redirect('/');