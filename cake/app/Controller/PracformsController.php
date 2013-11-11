<?php
	class PracformsController extends AppController{
		public $name = "Pracforms";
		public $components = array('DebugKit.Toolbar');

		public function index(){//indexアクション
		}

		public function result(){//resultアクション
			$data = $this->Pracform->hantei($this->request->data);
			$this->set('user',$data);
		}
	}
