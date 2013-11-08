<?php
	class MushupsController extends AppController{
		public $name = "Mushups";
		public $components = array('DebugKit.Toolbar');

		public function show(){//アクション
			$bm = $this->Mushup->hatena();
			$this->set('bm',$bm);
		}
	}
