<?php
function numMessages($conn,$id){

    //include'../conn.php';
      $q=mysqli_query($conn,"SELECT * FROM sessions where user_id='$id' ORDER by session_id DESC LIMIT 2");
      $counter=0;
      $ltime=0;
      $ldate=0;
      $ptime=0;
      $pdate=0;
      if(mysqli_num_rows($q)){
      while($res=mysqli_fetch_array($q)){
        if($counter!=0){
          $ptime=$res['logout_time'];
          $pdate=$res['logout_date'];
        }else{
          ++$counter;
          $ltime=$res['login_time'];
          $ldate=$res['date'];
        }
      }
    $q2=mysqli_query($conn,"SELECT * FROM message where (receiver_id='$id') AND (date >= '$pdate') AND (date<='$ldate') AND (status=0)");
    $countMessage=0;
    
      while($res2=mysqli_fetch_array($q2)){
        ++$countMessage;

      }

    return $countMessage;
  }
  else return 0;
}
?>
