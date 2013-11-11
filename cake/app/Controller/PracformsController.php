<?php
	class PracformsController extends AppController{
		public $name = "Pracforms";
		public $components = array('DebugKit.Toolbar');

		public function index(){//indexアクション
		}

		public function result(){//resultアクション
			//if(!empty($this->request->data))
			$this->set('user',$this->Pracform->hantei($this->request->data));
		}
	}
