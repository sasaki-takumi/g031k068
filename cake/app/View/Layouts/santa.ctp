<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription ?>:
    <?php echo $title_for_layout; ?>
  </title>
  <?php
    echo $this->Html->script('jquery-1.10.2.min');

    echo $this->Html->meta('icon');

    echo $this->Html->css(array('santa','button'));

    echo $this->Html->script(array('snowstorm','Cheese_Cake_400.font','cufon-yui'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
</head>
<body>
  <div id="wrapper">
    <div id="header">
      <p><font face='cursive'>
        Wishing you a merry Christmas
        <!-- A Christmas present -->
      </font></p>
    </div> <!-- END header -->
    <div id="contents">
      <div id="main">
        <p>
          <div id="stylized" class="myform">
            <!--<form id="form" name="form" method="post" action="index.html">
              <h1>検索</h1>
              <p>あなたの悩める種はいったい・・・</p>

              <label>検索ワード
                <span class="small">迷ったら入力！</span>
              </label>
              <input type="text" name="name" value="検索項目" />

              <label>検索項目
                <span class="small">何にしますか</span>
              </label>
              <input type="text" name="name2" value="item" />

              <label>検索名
                <span class="small">名前大事</span>
              </label>
              <input type="text" name="name3" value="name" />

              <label>ジャンル選択
                <span class="small">どういう項目を選びますか</span>
              </label>
              <select name="name4">
                <option value="サンプル1">アクセサリー</option>
                <option value="サンプル2">ファッション・小物</option>
                <option value="サンプル3">マフラー・手袋</option>
                <option value="サンプル4">靴下</option>
                <option value="サンプル5">美容・コスメ系</option>
              </select>

              <button type="submit">検索</button>
              <div class="spacer"></div>
            </form>-->
            <p>
              <?php echo $this->Session->flash(); ?>

              <?php echo $this->fetch('content'); ?>
            </p>
          </div>
        </p>
        <img src="http://www.xmas-sozai.com/image/scut/santa4b.gif" align="right" id="header-img">
      </div> <!-- END main -->
      <div id="navi">
        <div class="scroll">
          <?php echo $this->fetch('left_sidebar'); ?>
      </div> <!-- END scroll -->
      </div> <!-- END navi-->
    </div> <!-- END contents -->
    <div id="footer">

      <p>
        produced by Aomori Mac'Ason
      </p>

    </div> <!-- END footer -->
  </div> <!-- END wrapper -->
  <!--
  <script>
    $('img').animate({"right":"1070px"},{ duration:5000});
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
    Cufon.replace($('font')); //h1と記述した部分のフォントが変わります
    Cufon.now();
    });
  </script>
  -->
</body>
</html>