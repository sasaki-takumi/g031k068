<?php
	class HogeController extends AppController{
		public $name = "Hoge";
		public $components = array('DebugKit.Toolbar');

		public function index(){//アクション

		}

		public function input(){

		}

		public function show(){
			if ($this->request->is('POST')) {//POST送信されたか
				$jikan = $this->request->data['Aisatsu']['jikan'];
				$mes = $this->Hoge->handan($jikan);
				$this->set('say',$mes);//ビューに値を受け渡す
			}else {//URLで直接アクセスした人など
				$this->flash(
					'inputアクションから来て下さい',
					array(
						'controller' => 'hoge',
						'action' => 'input'
						)
					);
				//$this->redirect('input');
			}
		}
	}