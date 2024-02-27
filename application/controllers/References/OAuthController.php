<?php

    
        use League\OAuth2\Client\Provider\Google;
    


        class OAuthController extends CI_Controller
        {

            private $client;
            public function __construct(){

                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
                $this->load->helper('form');
                $this->load->library('form_validation');
               
             

            }
            public function index()
            {
                // Create the OAuth 2.0 client
                $this->client = new Google([
                    'clientId' => config('oauth.client_id'),
                    'clientSecret' => config('oauth.client_secret'),
                    'redirectUri' => config('oauth.redirect_uri'),
                ]);

                // Get the authorization URL
                $authUrl = $this->client->getAuthorizationUrl();

                // Redirect the user to the authorization URL
                header('Location: ' . $authUrl);
            }

            public function callback()
            {
                // Get the authorization code from the query string
                $authCode = $this->request->get('code');

                // Exchange the authorization code for an access token
                $accessToken = $this->client->getAccessToken($authCode);

                // Save the access token in the session
                $this->session()->set('accessToken', $accessToken);

                // Redirect the user to the home page
                return $this->redirect()->to('Control/welcome');
            }
        }