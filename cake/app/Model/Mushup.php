<?php
	class Mushup extends Model{
		public $name = 'Mushup';
		public $useTable = false;

		public function hatena(){
			$rss = simplexml_load_file('http://b.hatena.ne.jp/s-takumi/rss');
			//var_dump($rss);

			//タイトル
			echo '<h2><a href="'.$rss->channel->link.'"/>[はてなブックマーク]'.$rss->channel->title.'</a></h2>';

			//リンク、タイトル、コメントを連想配列に入れる
			foreach ($rss->item as $item) {
				$x = array();
				$x['link'] = $item->link;
				$x['title'] = $item->title;
				$x['description'] = $item->description;
				$data[] = $x;
			}
			//var_dump($data);

			return $data;
		}
	}
