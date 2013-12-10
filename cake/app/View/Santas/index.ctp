<?php
	if (empty($val)) {
		echo $this->Form->create(array(
			'type' => 'post',
			'url' => 'index'
		));

		echo '<h2><strong>プレゼント</strong>したい相手は？</h2>';

		echo $this->Form->select('type',
			array('父親' => '父親','母親' => '母親','息子' => '息子','娘' => '娘','彼氏' => '彼氏','彼女' => '彼女','友達' => '友達'),
			array('value' => '友達')
		);

		echo $this->Form->submit('決定');
		echo $this->Form->end();
	}else {
		//debug($val);

		echo '<h2>こんな<strong>プレゼント</strong>はいかがですか？</h2>';
		echo $this->Html->link('戻る',array('action' => 'index'));
		echo '<hr />';

		$random = array(0,1,2,3,4,5,6,7,8,9,10);
		shuffle($random);

		for ($i=0; $i<3; $i++) { 
			// echo '商品名：'.$val[$random[$i]]->Item->itemName;
			// echo '<br />';
			// echo '価格：'.$val[$random[$i]]->Item->itemPrice.'円';
			// echo '<br />';
			// echo 'レビュー平均：'.$val[$random[$i]]->Item->reviewAverage;
			// echo '<br />';
			// echo '<a href='.$val[$random[$i]]->Item->shopUrl.'><img src='.$val[$random[$i]]->Item->mediumImageUrls[0]->imageUrl.'></a>';
			// echo '<hr />';

			//echo '商品名：'.$val[$i]->Items[$random[$i]]->Item->itemName.'<br />';

			echo '<b>商品名：</b>'.$val[$i]->Items[$random[$i]]->Item->itemName;
			echo '<br />';
			echo '<b>価格：</b>'.$val[$i]->Items[$random[$i]]->Item->itemPrice.'円';
			echo '<br />';
			echo '<b>レビュー平均：</b>'.$val[$i]->Items[$random[$i]]->Item->reviewAverage;
			echo '<br />';
			echo '<a href='.$val[$i]->Items[$random[$i]]->Item->shopUrl.'><img src='.$val[$i]->Items[$random[$i]]->Item->mediumImageUrls[0]->imageUrl.'></a>';
			echo '<hr />';
		}
	}

	$this->start('left_sidebar');//左にサイドバー(left_sidebar)ブロックスを作成
		echo $this->element('tweets');
	$this->end();