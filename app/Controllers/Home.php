<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$contact_name = $_POST['name'];
		$contact_email = $_POST['email'];
		$contact_message = $_POST['message'];

		$contact = [
			'contact_name' => $contact_name,
			'contact_email' => $contact_email,
			'contact_message' => $contact_message
		];

		$this->db->table('contact_forms')->insert($contact);

		//return view('getdata',['contact' => $contact_message]);

		return redirect()->to('http://localhost:4200/');
	}
}
