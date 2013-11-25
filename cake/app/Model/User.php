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
			$data['name'] = $res['entry']['name'];
			$data['email'] = $res['entry']['email'];
			$data['sex'] = $res['entry']['sex'];
			$data['password'] = $res['entry']['pass'];

			if($this->save($data))//データを追加したら
				return 1;

			return 0;
		}
	}