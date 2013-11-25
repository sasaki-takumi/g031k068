<?php
	class EntriesController extends AppController {
		public $name ='Entries';
		public $uses = array('User');//モデルを利用
		public $components = array('DebugKit.Toolbar');//DebugKitの利用
		public $layout = 'bootstrap3';

		public function index(){//トップページ
			$this->set('data',$this->User->find('all',array(
				'order' => 'User.id DESC')));
		}

		public function result(){
			if ($this->request->is('post')) {
				if (!$this->User->into($this->request->data)) {
					$this->render('index');
					return;
				}
			}
		}
	}