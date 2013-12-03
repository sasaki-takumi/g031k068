<?php
	class User extends Model {
		public $name = 'User';
		public $validate = array(
            'name' => array(
                'rule1' => array(
                    'rule' => array('custom','/^[a-zA-Z]*$/'),
                    'required' => true,
                    'alloEmpty' => false,
                    'message' => '半角英字で入力して下さい'
                    ),  
                'rule2' => array(
                    'rule' => 'isUnique',
                    'required' => true,
                    'alloEmpty' => false,
                    'message' => '入力されたユーザ名は既に使われています'
                    ),
                'rule3' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'alloEmpty' => false,
                    'message' => '必ず入力して下さい'
                )
            ),
            'email' => array(
                'rule' => 'email',
                'required' => true,
                'alloEmpty' => false,
                'message' => 'メールアドレスの形式で必ず入力して下さい'
            ),
            'password' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'alloEmpty' => false,
                'message' => '必ず入力して下さい'
            ),
            'pass_check' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'alloEmpty' => false,
                'message' => '必ず入力して下さい'
            )
        );
	}