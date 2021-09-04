<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
	public function index()
	{

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		$contact_server = $_SERVER['HTTP_REFERER'];
		$contact_site = 'https://www.progalaxyelabs.com/';
		$contact_local_site = 'http://localhost:4200/';

		if($contact_server == $contact_site || $contact_server == $contact_local_site)
		{

			$data = json_decode(file_get_contents("php://input"));

			$contact_name = filter_var($data->name, FILTER_SANITIZE_STRING);
			$contact_email = filter_var($data->email, FILTER_SANITIZE_EMAIL);
			$contact_message = filter_var($data->message, FILTER_SANITIZE_STRING);

			$contact = [
				'contact_name' => $contact_name,
				'contact_email' => $contact_email,
				'contact_message' => $contact_message
			];

			$this->db->table('contact_forms')->insert($contact);

			return json_encode('Success');
		}
		else {
			return json_encode('Failed');
		}
	}
}