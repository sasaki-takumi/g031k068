<?php
	class User extends Model {
		public $name = 'User';
		public $validate = array(
            'name' => array(
                'rule' => array('custom','/^[a-zA-Z]*$/'),
                'required' => true,
                'alloEmpty' => false,
                'message' => '半角英字で入力して下さい'
            ),
            'email' => array(
                'rule' => 'email',
                'required' => true,
                'alloEmpty' => false,
                'message' => 'メールアドレスの形式で必ず入力して下さい'
                ),
            'password' => array(
                'rule' => array('custom','/^[a-zA-Z0-9]*$/'),
                'required' => true,
                'alloEmpty' => false,
                'message' => '必ず入力して下さい'
            )
        );
	}