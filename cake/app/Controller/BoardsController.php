<?php
	class BoardsController extends AppController {
		public $name ='Boards';
		public $uses = array('Board');//モデルを利用
		public $components = array('DebugKit.Toolbar');//DebugKitの利用
		public $layout = 'bootstrap3';

		public function index(){//トップページ
			$this->set('data',$this->Board->find('all',array(
				'order' => 'Board.id DESC')));
		}

		public function create(){
			if (!empty($this->request->data['entry']['content']))//コメントが入力されていたら
				$this->set('confirm',$this->request->data);
			$this->set('label','投稿内容');//追加するときのラベル内容
		}

		public function save(){//モデルにデータを渡す
			$this->Board->into($this->request->data);
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