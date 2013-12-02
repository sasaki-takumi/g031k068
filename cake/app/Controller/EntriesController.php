<?php
	class EntriesController extends AppController {
		public $name ='Entries';
		public $uses = array('User');//モデルを利用
		public $components = array('DebugKit.Toolbar');//DebugKitの利用
		public $layout = 'bootstrap';

		public function index(){//トップページ
			$this->set('data',$this->User->find('all',array(
				'order' => 'User.id DESC')));
		}

		public function result(){
	        if(!empty($this->request->data['User'])){
	        	//モデル[User]にデータを設定,モデル[User]のvalidatesメソッドを使ってバリデーションを行う。
	            $this->User->set($this->request->data);
	            if($this->User->validates()){ //バリデーションOKの場合の処理
	                $this->User->save($this->request->data);
	            }else{//バリデーションNGの場合の処理
	                $this->render('index');
	            }
	        }
		}
	}