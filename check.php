<?php
  if (isset($_GET['device']) && trim($_GET['device']) != '') {
      $device = htmlentities(str_replace("..", ",", $_GET['device']), ENT_QUOTES);
  } else {
      $device = '';
  }

  if (isset($_GET['version']) && trim($_GET['version']) != '') {
      $version = htmlentities($_GET['version'], ENT_QUOTES);
  } else {
      $version = '';
  }

  if (isset($_GET['boardconfig']) && trim($_GET['boardconfig']) != '') {
      $boardconfig = htmlentities($_GET['boardconfig'], ENT_QUOTES);
  } else {
      $boardconfig = '';
  }

  if ($device != '' && $version != '' && $boardconfig != '') {
      $title =  $device.' - '.$version;
      $allargsset = true;
  } else {
      $title = 'TTSChecker | Bad Info';
      $allargsset = false;
  }

  function GetBetween($content,$start,$end){
      $r = explode($start, $content);
      if (isset($r[1])){
          $r = explode($end, $r[1]);
          return $r[0];
      }
      return '';
  }
?>
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class="navbar">
  <div class="navbar-inner">
    <div class="left"><a href="#" class="back link"> <i class="icon icon-back"></i><span></span></a></div>
    <div class="center sliding"><?php echo $device; ?></div>
    <div class="right">
    </div>
  </div>
</div>
<div class="pages">
  <!-- Page, data-page contains page name-->
  <div data-page="signing_status" class="page">
    <!-- Scrollable page content-->
    <div class="page-content">
      <div class="content-block-title">Signing Status</div>
      <?php if (strpos($device, "AppleTV") !== false): ?>
        
        <div class="card" style="background-image: linear-gradient(to right, #84c1ec, #66c4e7, #49c6dd, #36c6cc, #39c6b7); color: white;">

      <?php endif ?>

      <?php if (strpos($device, "iPod") !== false): ?>
        
        <div class="card" style="background-image: linear-gradient(to right, #c7a9ff, #baa6ff, #aca3fe, #9da0fd, #8d9dfc); color: white;">

      <?php endif ?>

      <?php if (strpos($device, "iPad") !== false): ?>
        
        <div class="card" style="background-image: linear-gradient(to right, #a626d0, #822dbf, #5f2eac, #3d2b97, #1a2680);); color: white;">

      <?php endif ?>

      <?php if (strpos($device, "iPhone") !== false): ?>

        <div class="card" style="background-image: linear-gradient(to right, #f28ca8, #f48a9f, #f58995, #f5898c, #f48982); color: white;">

      <?php endif ?>
          <div class="card-content">
              <div class="card-content-inner">
                <span style="display:block; margin-left: 10px; margin-top: 5px; font-weight: 500; font-size: 20px;"><?php echo "$device"; ?></span>
                <span style="display:block; margin-left: 10px; margin-top: 5px; font-weight: 300; font-size: 13px;"><?php echo "on iOS $version"; ?></span>
                <span style="display:block; margin-left: 10px; margin-top: 5px; font-weight: 300; font-size: 13px;">
                  <?php 
                    $output = shell_exec('./tsschecker/tsschecker_macos -d '.escapeshellarg($device).' --boardconfig '.escapeshellarg($boardconfig).' -i '.escapeshellarg($version));
                    $arr1 = explode(PHP_EOL, $output);
                    end($arr1);
                    $arr2 = prev($arr1);
                    // print_r($arr2);
                    if (GetBetween($arr2, "IS ", " signed!") == "NOT being") {
                      echo "is not signed!";
                    } elseif (GetBetween($arr2, "IS ", " signed!") == "being") {
                      echo "is signed!";
                    } else {
                      echo "an unknown error occured!";
                    }
                  ?>
                </span>
                <img src="https://ipsw.me/api/images/320x/assets/images/devices/<?php echo $device; ?>.png" width="40px" height="auto" style="display: inline-block;position: absolute;top: 50%;transform: translateY(-50%);float: right;opacity: 0.3;filter: gray;-webkit-filter: grayscale(1);filter: grayscale(1);right: 10%;">
              </div>
          </div>
      </div>
    </div>
  </div>
</div>