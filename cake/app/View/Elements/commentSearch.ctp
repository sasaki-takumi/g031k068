<?php
	echo $this->Html->tag('h2','検索フォーム');
	echo $this->Html->tag('br /');

	echo $this->Form->create(array(
			'type' => 'post',
			'url' => 'index'
		));

	echo $this->Form->label('num','表示件数');
	echo $this->Form->text('num',array('type' => 'number'));//表示件数入力欄を表示

	echo $this->Html->tag('br /');

	echo $this->Form->label('content','検索内容');
	echo $this->Form->text('content',array('required' => 'required'));//コメント入力欄を表示

	//降順か昇順を選択
	echo $this->Form->select('sort',
		array('DESC' => '降順','ASC' => '昇順'),
		array('value' => 'DESC')
	);

	echo $this->Form->submit('検索する',array('div' => false,'class' => 'btn btn-default'));
	echo $this->Form->end();