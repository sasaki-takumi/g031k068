<?php
	class MushupsController extends AppController{
		public $name = "Mushups";
		public $components = array('DebugKit.Toolbar');

		public function index(){//アクション
			$data = $this->Mushup->load();
			$this->set('api',$data);
		}
	}
