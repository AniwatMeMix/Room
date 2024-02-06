     <?php
      $RoomID = $_POST["RoomID"] = NULL ;
      $RoomName = $_POST["RoomName"];
      $MaxGuest = $_POST["MaxGuest"];
      $CheckinDate = $_POST["CheckinDate"];
      $CheckoutDate = $_POST["CheckoutDate"];
      $RoomType = $_POST["RoomType"];
      $RoomPrice = $_POST["RoomPrice"];
      $RoomStatus = $_POST["RoomStatus"] = NULL;
      $RoomBookID = $_POST["RoomBookID"] = NULL;

      $k=100;

      $link = mysqli_connect("localhost","root","","roomtest");
      if(!$link)
      {
        exit("cannot connect database");
      }
      if($MaxGuest>2){
        $RoomPrice = $RoomPrice+$k;
      }

      $sql = "insert into room values('$RoomID','$RoomName','$MaxGuest','$CheckinDate','$CheckoutDate'
      ,'$RoomType','$RoomPrice','$RoomStatus','$RoomBookID')";

      $result = mysqli_query($link,$sql);
      if(!$result)
      {
        exit("ไม่สามารถจองห้องพักได้ โปรดย้อนกลับไปทำใหม่");
      }else{
          echo "จองห้องพักสำเร็จแล้ว"."<br>";
      }

      if ($link->query($sql) === TRUE) {    
        $last_id = $link->insert_id;
        echo "[FOR ADMIN] bill: " . $last_id ."<br>";
        } else {
        echo "Error: " . $sql . "<br>" . $link->error;
        } 

      $link = mysqli_connect('localhost', 'root ', '' , 'roomtest');
      $sql = "select * from room where RoomID = $last_id";
      $result = mysqli_query($link,$sql);

      while($data = mysqli_fetch_array($result))
      {
        echo "<br>ห้องพักเลขที่ : {$data['RoomName']}";
          echo "<br>ประเภทห้องพัก : {$data['RoomType']}";
        echo "<br>จำนวนผู้เข้าพัก : {$data['MaxGuest']}";
          echo "<br>CheckIN : {$data['CheckinDate']}";
          echo "<br>CheckOUT : {$data['CheckoutDate']}";
          echo "<br>ราคารวม : {$data['RoomPrice']}<br>";

      }

      echo "<br><a href=room_add.php> ย้อนกลับ</a>";
      mysqli_close($link);

