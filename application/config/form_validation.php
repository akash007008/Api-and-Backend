<?php 
		$config=[
					'admin_login' =>      	[
													[
														'field'=>'email',
														'label'=>'Email',
														'rules'=>'trim|required|valid_email'
													],
													[
														'field'=>'pass',
														'label'=>'password',
														'rules'=>'trim|required|alpha_numeric'
													]
											]
				]
?>