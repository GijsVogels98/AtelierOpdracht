<?php
	class Borrowed_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_loans($slug = FALSE) {
			if ($slug === FALSE) {
				$this->db->order_by('borrowed.borrowed_till', 'ASC');
				$this->db->join('products', 'products.product_id = borrowed.product_id');
				$query = $this->db->get('borrowed');
				return $query->result_array();
			}
			$query = $this->db->get_where('borrowed', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function redeem_loan($id){
		   
		   $data = array(
            'returned' => $this->input->post('returned'),
            'note_after' => $this->input->post('note_after'),
         );
         
         $this->db->where('id', $id);
         $this->db->update('borrowed', $data);
         return true;
      }
      
      public function search_blog($stamnr){
      	$this->db->like('stamnr', $stamnr , 'both');
			$this->db->order_by('stamnr', 'ASC');
			$this->db->limit(10);
			return $this->db->get('students')->result();
    	}
      
      public function create_loan() {
			
			$data = array(
				'customer_name' => $this->input->post('customer_name'),
				'student_number' => $this->input->post('student_number'),
				'customer_email' => $this->input->post('customer_email'),
				'customer_phone' => $this->input->post('customer_phone'),
				'borrowed_till' => $this->input->post('borrowed_till'),
				'product_id' => $this->input->post('product_id'),
				'returned' => 'no',
				'for_what' => $this->input->post('for_what'),
				'note_before' => $this->input->post('note_before'),
				'request' => 'false',
				'user_id' => $this->session->userdata('username'),
			);
			
			return $this->db->insert('borrowed', $data);;
		}

		
		public function request_loan() {
			
			$data = array(
				'customer_name' => $this->input->post('customer_name'),
				'student_number' => $this->input->post('student_number'),
				'customer_email' => $this->input->post('customer_email'),
				'customer_phone' => $this->input->post('customer_phone'),
				'borrowed_at' => $this->input->post('borrowed_at'),
				'borrowed_till' => $this->input->post('borrowed_till'),
				'product_id' => $this->input->post('product_id'),
				'returned' => 'no',
				'for_what' => $this->input->post('for_what'),
				'request' => 'true',
			);
			
			return $this->db->insert('borrowed', $data);
		}
		
		public function request_mail() {
		
			$email = 
			'<h3>Product aanvraag</h3>
			<p>op de website van het atelier is door ' . $this->input->post('customer_name') . ' een aanvraag gedaan.<br>
			<br>
			<strong>Leerlingnummer:</strong> ' . $this->input->post('student_number') . '<br>
			<strong>E-mailadres:</strong> ' . $this->input->post('customer_email') . '<br>
			<strong>Lenen van:</strong> ' . $this->input->post('borrowed_at') . '<br>
			<strong>Lenen tot:</strong> ' . $this->input->post('borrowed_till') . '<br>
			<br>
			' . $this->input->post('customer_name') . ' wil deze producten gebruiken voor:<br>
			' . $this->input->post('for_what') . '
			<br>
			<br>
			(Dit is een automatisch gegenereerd bericht waarop je niet kunt antwoorden)</p>';
			
			return $email;	
		}
		
		public function accept_request($id){
		   
		   $data = array(
            'request' => 'accepted',
            'note_before' => $this->input->post('note'),
            'user_id' => $this->session->userdata('username'),
         );
         
         $this->db->where('id', $id);
         $this->db->update('borrowed', $data);
			
         $email = 
			'<h3>Beste ' . $this->input->post('note') . ',</h3>
			<p>op de website van het atelier heb je een aanvraag gedaan om wat te lenen, je aanvraag is <strong>goedgekeurd</strong> door ' . $this->session->userdata('username') . '.
			<br>
			<br>
			Je kunt je product(en) op komen halen op ' . $this->input->post('borrowed_at') . ' bij Pieter Smolders.<br>
			<br>
			' . $this->input->post('customer_name') . 'Opmerking door ' . $this->session->userdata('username') . ':<br>
			' . $this->input->post('note') . '
			<br>
			<br>
			(Dit is een automatisch gegenereerd bericht waarop je niet kunt antwoorden)</p>';
			
			return $email;
      }
      
      public function denied_request($id){
		   
		   $data = array(
            'request' => 'denied',
            'note_before' => $this->input->post('note'),
            'user_id' => $this->session->userdata('username'),
         );
         
         $this->db->where('id', $id);
         $this->db->update('borrowed', $data);
         
         $email = 
			'<h3>Beste ' . $this->input->post('note') . ',</h3>
			<p>op de website van het atelier heb je een aanvraag gedaan om wat te lenen, je aanvraag is <strong>geweigerd</strong> door ' . $this->session->userdata('username') . '.
			<br>
			<br>
			De reden dat ' . $this->session->userdata('username') . ' je aanvraag geweigerd heeft is:<br>
			' . $this->input->post('note') . '
			<br>
			<br>
			(Dit is een automatisch gegenereerd bericht waarop je niet kunt antwoorden)</p>';
			
			return $email;
      }
      
      public function delete_loan($id){
		    $this->db->where('id', $id);
		    $this->db->delete('borrowed');
		    return true;
      }
	}