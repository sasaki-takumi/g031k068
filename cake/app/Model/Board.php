<?php
	class Board extends Model {
		public $name = 'Board';

		public function into($res){
			if (isset($res['result']['id']))//idがあったら
				$data['id'] = $res['result']['id'];

			$data['comment'] = $res['result']['content'];
			$this->save($data);//データの挿入or更新
		}
	}