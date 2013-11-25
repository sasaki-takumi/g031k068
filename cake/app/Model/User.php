<?php
	class User extends Model {
		public $name = 'User';
		public $validate = array(
			'name' => array(
				'rule' => array('maxLength','10'),
				'message' => '10文字以内で入力して下さい'),
			'email' => array(
				'rule' => 'email',
				'message' => '正しいメールアドレスを入力して下さい')
			);

		public function into($res){
			$data['name'] = $res['User']['name'];
			$data['email'] = $res['User']['email'];
			$data['sex'] = $res['User']['sex'];
			$data['password'] = $res['User']['pass'];

			if($this->save($data))//データを追加したら
				return 1;

			return 0;
		}
	}