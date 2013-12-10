<?php
	App::import('vendor','twitteroauth');

	class SantasController extends AppController {
		public $name ='Santas';
		public $layout = 'santa';//レイアウトの利用
		public $components = array('DebugKit.Toolbar');

		public function index(){
			if($this->request->is('post')){//POST送信だったら
				$this->set('val',$this->Santa->load($this->request->data));
			}

			$consumerKey = 'QkA0lkQ8P55EM90jPFLYg';
            $consumerSecret = '39ksHcvZvBJTuhXRywdCZt7GHusquXV0rH4tV2HT04';
            $accessToken = '773367456-Oprmu5alKZCpMLpL0ULFv1zqkwLk3h45GBAcQGJp';
            $accessTokenSecret = 'QaAot3lsjY6T9z1liZNNmY8vPiyOMqigOYAbvThgCUbC9';
 
            $twObj = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);
            $req = $twObj->OAuthRequest('https://api.twitter.com/1.1/search/tweets.json','GET',  array(
                'lang' => 'ja',
                'q' => '%23クリスマスプレゼント'
            ));
            $tweets = json_decode($req);
            $this->set('tweets',$tweets);
		}

	}