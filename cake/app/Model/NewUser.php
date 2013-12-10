<?php
    class NewUser extends Model{
        public $name = 'NewUser';
        // public $belongsTo = array(
        //         'User' => array(
        //             'className' => 'User',
        //             'foreignKey' => 'user_id'
        //         ));
 
        var $validate = array(
            'tw_id' => array(
                'rule' => 'isUnique', //重複登録回避
                'message' => '重複です'
            ),
            'username' => array(
                'rule' => 'isUnique', //重複登録回避
                'message' => '重複です'
            )
        );
 
        //新規登録＆ログイン
        public function signin($token){
            //アクセストークンを正しく取得できなかった場合の処理
            if(is_string($token))return; //エラー
 
            $data['tw_id'] = $token['user_id'];
            $data['username'] = $token['screen_name'];
            $data['password'] = Security::hash($token['oauth_token']);
            //$data['oauth_token'] = Security::hash($token['oauth_token']);
            //$data['oauth_token_secret'] = Security::hash($token['oauth_token_secret']);
 
            //バリデーションチェックでエラーがなければ、新規登録
            if($this->validates())$this->save($data);
            return $data; //ログイン情報
        }

        public function idid($data){//twitterユーザのidを返す
            $tmp = $this->find('all',array(
             'conditions' => array('tw_id' => $data['User']['tw_id']),
            ));

            return $tmp[0]['User']['id'];//idを返す
        }
    }
?>