<?php
	class PracformsController extends AppController{
		public $name = "Pracforms";
		public $components = array('DebugKit.Toolbar');

		public function index(){//アクション
		}

		public function result(){//アクション
			// $tmp = $this->request->data['entry'];
			// $this->set('user',$tmp);//ビューに値を受け渡す
		}
	}
