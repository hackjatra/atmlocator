<?php

class Welcome extends Controller {

	function __construct()
	{
		parent::__construct();
        parse_str($_SERVER['QUERY_STRING'],$_GET);
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}

    function openid()
    {
        $this->load->view('openidform');
    }

    function openidlogin()
    {
        require_once APPPATH . 'libraries/openid.php';
        try {
            $openid = new LightOpenID;
            if (!$openid->mode) {
                if (isset($_POST['login'])) {
                    $openid->identity = 'https://www.google.com/accounts/o8/id';
                    $openid->required = array('namePerson/first', 'namePerson/last', 'contact/email', 'pref/language');
                    header('Location: ' . $openid->authUrl());
                }
            } else {
                // Successful login
                var_dump($_POST); var_dump($_GET);
            }
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
}

