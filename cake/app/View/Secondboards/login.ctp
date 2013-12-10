<div class="hero-unit">
    <?php echo $this->Session->flash('Auth'); ?>
    <?php echo $this->Form->create('User', array('url' => 'login')); ?>
    <?php echo $this->Form->input('User.name', array('label' => 'ユーザ名')); ?>
    <?php echo $this->Form->input('User.password', array('label' => 'パスワード')); ?>
    <?php echo $this->Form->end('ログイン'); ?>
    <a href="useradd" id="switch" class="label btn-primary">新規登録</a>

    <?php if(empty($user)): /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ ?>
	    <?php //echo $this->Form->create('tw_logins',
	        //array('controller' => 'secondboards','action'=>'twitter_login'));?>
	    <?php //echo $this->Form->end(__('Twitter で Login'));?>
	    <?php echo $this->Html->link('twitter',array('action' => 'twlogin')); ?>
	<?php else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ ?>
	    ログイン済みです。
	    <?php echo $user['User']['name']; ?>
	    <strong><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></strong>
	<?php endif ; ?>


	

	<?php echo $this->Html->link('Facebook',array('action' => 'fblogin')); ?>

</div>