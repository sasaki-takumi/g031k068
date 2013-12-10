<?php
	class FbboardsController extends AppController {
		public $name ='Fbboards';
		public $uses = array('Board','User');//モデルを利用
		public $layout = 'bootstrap3';//レイアウトの利用
		public $components = array(
					'DebugKit.Toolbar',//DebugKitを利用
					'Auth' => array(//ログイン機能を利用
						'authenticate' => array(
							'Form' => array(
								'userModel' => 'User',//Userモデルを使用
								'fields' => array('username' => 'name','password' => 'password')//認証に利用するフィールドの変更
							)
						),
					//ログイン後の移動先
					'loginRedirect' => array('controller' => 'fbboards','action' => 'index'),
					//ログアウト後の移動先
					'logoutRedirect' => array('controller' => 'fbboards','action' => 'login'),
					//ログインページのパス
					'loginAction' => array('controller' => 'fbboards','action' => 'login'),
					//ログインしていないときのメーッセージ
					'authError' => '名前とパスワードを入力して下さい',
					)
				);
		
		public function beforeFilter(){
			$this->Auth->allow('login','logout','useradd','createFacebook','fblogin','fb_callback');//ログインしなくても、アクセスできるアクションを登録する
			$this->set('user',$this->Auth->user());//ctpで$userを使えるようにする
		}

		private function createFacebook() {
            return new Facebook(array(
                    'appId' => '254291381395538',
                    'secret' => '0a04066162e1ebf2da8a6fb169a2dbe6'
            ));
        }

        public function fblogin(){
        	$facebook = $this->createFacebook();
            $fb_user = $facebook->getUser(); //これ大事

            if (!$fb_user){
            	$url = $facebook->getLoginUrl(array(
                    'scope' => 'email,publish_stream,user_birthday,user_education_history,user_likes'
                ));
               $this->redirect($url);
            }
        }

        public function fb_callback(){
			$this->facebook = $this->createFacebook();
	    	//$me = null;
			$user = $this->facebook->getUser();
	          
	    	if ($user) {
	    		//$me = $this->facebook->api('/me');
	    		$this->redirect($this->Auth->redirect());//ログイン成功したら、リダイレクト
	    	} else {
	    		$this->redirect('/fbboards/logout/');//失敗したら、元のページへもどる
	    	}
	            
	        
	  //   	$access_token = $this->facebook->getAccessToken();//access_token入手
	  //   	$test = $this->Example->find('first',array('conditions' => array('facebook_id' => $me['id'])));
	    	
	  //   	$this->Example->facebook(
			// 		Array(
	  //       		              'facebook_id' => $me['id'],
	  //           	                      'username' => $me['first_name'].'.'.$me['last_name'],
	  //           	                      'facebook_access_token' =>  $access_token,
	  //           	                      )
	  //           );//facebookのデータからユーザ登録を行う
	    	
	    	
			// $this->data['Example']['facebook_id'] = $me['id'];
			// $this->data['Example']['facebook_access_token'] = $access_token;
			
			// if ($this->Auth->login($this->data)){//Authの処理
			// 	$this->redirect($this->Auth->redirect());//ログイン成功したら、リダイレクト
			// } else {
			// 	$this->redirect('/fbboards/logout/');//失敗したら、元のページへもどる
			// }
        }

		public function login(){//ログイン
			if($this->request->is('post')){//POST送信だったら
				if ($this->Auth->login()) {//ログイン成功したら
					//$this->Session->delete('Auth.redirect');//前回ログアウト時のリンクを記録させない
					return $this->redirect($this->Auth->redirect());//Auth指定のログインページへ移動する
				}else {//ログイン失敗したら
					$this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'
					));
				}
			}
		}

		public function logout(){//ログアウト
            $this->Auth->logout();
            $this->Session->destroy(); //セッションを完全に削除する
            $this->Session->setFlash(__('ログアウトしました'), 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-success'
			));
            $this->redirect(array('action' => 'login'));
        }

        public function useradd(){//ユーザ追加
            if($this->request->is('post')) {//POST送信だったら

				//同じユーザ名があるかチェック
				$nameflag = 'entryname';
            	$usercheck = $this->User->find('all');//全てのユーザの情報を取得
            	foreach ($usercheck as $value) {
            		if ($value['User']['name'] == $this->request->data['User']['name']) {//同じユーザ名があったら
            			$nameflag = 'samename';
            		}
            	}

				if ($nameflag == 'entryname') {//同じユーザ名がなかったら
	                //入力したパスワートとパスワードチェックの値が一致だったら
	                if($this->request->data['User']['pass_check'] === $this->request->data['User']['password']){	

	                    $this->User->create();//ユーザーの作成。insertを発行するSaveメソッドが複数回呼ばれる時に、毎回create()を実行し、Saveする。それ以外のSave時は特に事前にcreate()する必要なし(Insert/Updateに関わらず)

	                    if(!empty($this->request->data['User'])){
				            $this->User->set($this->request->data);
				            if($this->User->validates()){ //エラーがなければ
				            	//パスワードとパスチェックの値をハッシュ値変換する
			                	$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			                	$this->request->data['User']['pass_check'] = AuthComponent::password($this->request->data['User']['pass_check']);

				                $this->User->save($this->request->data);
								
								$this->Session->setFlash(__('登録が完了しました'), 'alert', array(
									'plugin' => 'BoostCake',
									'class' => 'alert-success'
								));

								$this->redirect(array('action' => 'login'));//リダイレクト
				            }else{
				                $this->render('useradd');
				            }
	       				 }
	                }else{
	                    $this->Session->setFlash(__('パスワード確認の値が一致しません'), 'alert', array(
							'plugin' => 'BoostCake',
							'class' => 'alert-danger'
						));
	                }
				}else {
        			$this->Session->setFlash(__('入力されたユーザ名は既に使われています'), 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'
					));
				}
            }
        }

		public function index(){//トップページ
			$this->layout = 'bootstrap3board';//レイアウトの指定

			$this->set('data',$this->Board->find('all',array(
				'order' => 'Board.id DESC')));

			//検索
			if($this->request->is('post')){//POST送信だったら
				$tmp = $this->Board->find('all',array(
					'conditions' => array('Board.comment like' => '%'.$this->request->data['Board']['content'].'%'),
					'order' => 'Board.id '.$this->request->data['Board']['sort'],
					'limit' => $this->request->data['Board']['num']
				));

				$this->set('result',$tmp);
			}
		}

		public function create(){
			if (!empty($this->request->data['entry']['comment']))//コメントが入力されていたら
				$this->set('confirm',$this->request->data);
			$this->set('label','投稿内容');//追加するときのラベル内容
		}

		public function save(){//モデルにデータを渡す
			$this->request->data['Board']['user_id'] = $this->Auth->user('id');//user_idの設定
			$this->Board->save($this->request->data);//データの登録or更新
			$this->redirect(array('action' => 'index'));
		}

		public function edit($id) {//編集アクション
			$data = $this->Board->findById($id);//$idの情報を$dataに入れる
			$this->set('data',$data);
			$this->set('label','編集内容');//編集のときのラベル内容
			$this->render('create');
		}

		public function delete($id) {//削除アクション
			$this->Board->delete($id);
			$this->redirect(array('action' => 'index'));
		}

	}