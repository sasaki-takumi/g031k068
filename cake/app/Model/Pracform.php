<?php
	class Pracform extends Model{
		public $name = 'Pracform';
		public $useTable = false;

		public function hantei($data) {
			if(!empty($data['entry'])){//$data['entry']に値が入っていたら
				$ans['name'] = $data['entry']['lastname'].' '.$data['entry']['firstname'];//名前を配列に入れる
				if ($data['entry']['sex'] == 0) {//性別の判定
					$ans['sex'] = '男';
				}else {
					$ans['sex'] = '女';
				}
				$ans['year'] = $data['entry']['year'];//学年を配列に入れる
				$i = 0;
				foreach ($data['entry']['hobby'] as $value) {//趣味を配列に入れる
					if (!empty($value)) {
						$ans['hobby'][$i] = $value.' ';
						$i++;
					}
				}
				$ans['comment'] = $data['entry']['comment'];//コメントを配列に入れる
				$ans['pass'] = $data['entry']['pass'];//パシワードを配列に入れる
				$ans['time'] = $data['entry']['time'];//登録時間を配列に入れる
			}else{
				$ans = null;
			}
			return $ans;
		}
	}