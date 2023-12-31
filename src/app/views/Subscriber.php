<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Premium</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo strip_tags($REL_DATA, '<link>');?>
</head>
<?php if(file_exists($TOP_BAR)) include_once($TOP_BAR);?>
<img class="sty-bckgrnd" src="/storage/assets/logo.svg" alt="Stylized Background">
<body class="gen-body">
  <div class="main-content first">
    <div class="gen-header cluster-h">
      <h1>Author Khusus</h1>
    </div>
    <div class="book-grid" style="margin-top: 15px;">
      <?php
      if (is_array($data)) {
        foreach ($data as $key => $value) {
            if (is_array($value) && isset($value['username'])) {
                echo '<div class="author-info" style="margin:15px 15px">';
                echo '<img src="/storage/assets/profile.svg" alt="Author Image">';
                echo '<p class="title-text" style="font-size:16px;font-weight:bold">' . $value["name"] . '</p>';
                
                if(!isset($value['status'])){
                  echo '<form method="POST" action="/subscribe">';
                  echo '<input type="hidden" name="author_id" value="' . $value["author_id"] . '">';
                  echo '<button class="btn btn-grey" type="submit" name="subscribe_button">Subscribe</button>';
                  echo '</form>';
                } else{
                  switch ($value['status']) {
                    case 'PENDING':
                      echo '<p class="subtitle-text" style="font-size:14px;margin:0px;padding:14.5px 0px">Request pending</p>';
                      echo '<form method="POST" action="/unsubscribe" style="margin-top:5px">';
                      echo '<input type="hidden" name="author_id" value="' . $value["author_id"] . '">';
                      echo '<button class="btn btn-red" type="submit" name="cancel_subscribe_button">Cancel Request</button>';
                      echo '</form>';
                      break;
                    case 'ACCEPTED':
                      echo '<a class="btn btn-yellow" onclick="location.href=\'/userbooks?aid=' . $value['author_id']. '\'" style="display:inline-block;font-size:13.3333px">Lihat detail</a>';
                      echo '<form method="POST" action="/unsubscribe" style="margin-top:5px">';
                      echo '<input type="hidden" name="author_id" value="' . $value["author_id"] . '">';
                      echo '<button class="btn btn-red" type="submit" name="cancel_subscribe_button">Unsubscribe</button>';
                      echo '</form>';
                      break;
                    case 'REJECTED':
                      echo '<p class="subtitle-text" style="font-size:14px;color:red">Request rejected</p>';
                      break;
                    
                    default:
                      echo '<form method="POST" action="/subscribe">';
                      echo '<input type="hidden" name="author_id" value="' . $value["author_id"] . '">';
                      echo '<button class="btn btn-yellow" type="submit" name="subscribe_button">Subscribe</button>';
                      echo '</form>';
                      break;
                  }
                }
                echo '</div>';
            }
        }
    } else {
        echo 'Data tidak valid atau kosong.';
    }
      ?>
    </div>
  </div>
</body>
</html>
