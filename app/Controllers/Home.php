<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;
use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
	public function get_quote()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		$contact_server = $_SERVER['HTTP_ORIGIN'];
		$contact_site = 'https://www.progalaxyelabs.com';
		$contact_local_site = 'http://localhost:4200';


		if (($contact_server == $contact_site) || ($contact_server == $contact_local_site)) {

			$data = json_decode(file_get_contents("php://input"));

			if (!empty($data->recaptcha)) {
				$secret = getenv('SECRET_KEY');
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $data->recaptcha);
				$responseData = json_decode($verifyResponse);
				if ($responseData->success) {
					$contact_name = filter_var($data->name, FILTER_SANITIZE_STRING);
					$contact_email = filter_var($data->email, FILTER_SANITIZE_EMAIL);
					$contact_message = filter_var($data->message, FILTER_SANITIZE_STRING);

					$contact = [
						'contact_name' => $contact_name,
						'contact_email' => $contact_email,
						'contact_message' => $contact_message
					];

					$this->db->table('contact_forms')->insert($contact);

					echo json_encode('Success');
					echo "<br>";
					echo json_encode("g-recaptcha verified successfully");
				} else {
					echo json_encode('Failed');
					echo "<br>";
					echo json_encode("Some error in verifying g-recaptcha");
					$this->response->setStatusCode(401);
				}
			} else {
				echo json_encode("recaptcha is missing");
				$this->response->setStatusCode(403);
			}
		} else {
			echo json_encode('Failed');
			$this->response->setStatusCode(403);
		}
	}

	public function index()
	{
		if (isset($_SESSION['email'])) {
			return redirect()->to('/home/dashboard?page=1');
		}
		else{

		return view('signin');
		}
	}

	public function signin_submit()
	{
		if (isset($_SESSION['email'])) {
			return redirect()->to('/home/dashboard?page=1');
		}
		else{
			$email = filter_input(
				INPUT_POST,
				'email',
				FILTER_SANITIZE_EMAIL
			);
			$password = filter_input(
				INPUT_POST,
				'password',
				FILTER_SANITIZE_STRING
			);

			$sql = 'select admin_password from admin_signin where admin_email = ?;';

			$admin = $this->db->query($sql, [$email])->getRow();

			if (password_verify($password, $admin->admin_password)) {
				$_SESSION['email'] = $email;
				return redirect()->to('/home/dashboard?page=1');
			} else {
				return view('signin', ['signin_error' => 'Incorrect email or password']);
			}
		}
	}

	public function dashboard()
	{
		if (!isset($_SESSION['email'])) {
			return redirect()->to('/');
		}
		else{
			$page = filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

			$from = ceil(($page*10)-10);
			$from < 0 ? 0 : $from;
			$page=ceil($page*10);

			$sql = "select * from contact_forms limit ?, 10;" ;

			$data = $this->db->query($sql,[$from])->getResult();
			$cout = $this->db->query("select count(contact_form_id) as num_records from contact_forms;")->getRow();

			$cout =  $cout->num_records;

			return view('dashboard', ['data' => $data , 'cout' => $cout, 'from' => $from , 'page' => $page]);
	}
	}

	public function logout()
	{
		unset($_SESSION['email']);		
		
		return redirect()->to('/');
	}
}