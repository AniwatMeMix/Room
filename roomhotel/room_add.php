<html>
<head>
	<link rel="stylesheet" type="text/css" href="StyleRoom.css">
</head>
    <?php
      $link = mysqli_connect('localhost', 'root ', '' , 'roomtest');
      if(!$link){
        echo "Connect_Error";
      }
    ?>

    <body>
        <header style="text-align:right;width:150%;"><br><h1>ระบบจองห้องพัก</h1><br></header>
        <form name="form_add" action="room_add_action.php" method="post">
      
        <dir style="text-align:right;width:80%;">
		    <p>CheckIN : <input type="date" name="CheckinDate" required></p>
	      </dir>

          <dir style="text-align:right;width:80%;">
	    	<p>CheckOUT : <input type="date" name="CheckoutDate" required></p>
	      </dir>

          <dir style="text-align:right;width:80%;">
            <label>จำนวนผู้เข้าพัก : 
            <select name="MaxGuest" id="MaxGuest">
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                </select></label>
	      </dir>

            <dir style="text-align:right;width:80%;">
              <label>ห้องที่ : 
              <select name="RoomName" id="RoomName" >
                <option value="">---เลือกห้อง---</option>
                <?php
                 $sql = "select * from room_info ORDER BY room_id ASC ";
                 $result = mysqli_query($link,$sql);
                 while($data1=mysqli_fetch_array($result))
                 {
                ?>
                 <option value="<?php echo $data1["room_name"]?>">
                 <?php echo $data1["room_name"];?>
                 </option>
                 <?php
                 }
                ?>
              </select></label>

            </dir>
          
          <dir style="text-align:right;width:80%;">
          <label>ประเภทห้อง : 
              <select name="RoomType" id="RoomType" >
                <option value="">---เลือกประเภท---</option>
                <?php
                 $sql = "select DISTINCT room_type from room_info ";
                 $result = mysqli_query($link,$sql);
                 while($data1=mysqli_fetch_array($result))
                 {
                ?>
                 <option value="<?php echo $data1["room_type"]?>">
                 <?php echo $data1["room_type"];?>
                 </option>
                 <?php
                 }
                ?>
              </select></label>
	      </dir>
          <dir style="text-align:right;width:80%;">
          <label>ราคาต่อคืน : 
              <select name="RoomPrice" id="RoomPrice" >
                <option value="">---ราคา---</option>
                <?php
                 $sql = "select DISTINCT room_price from room_info ";
                 $result = mysqli_query($link,$sql);
                 while($data1=mysqli_fetch_array($result))
                 {
                ?>
                 <option value="<?php echo $data1["room_price"]?>">
                 <?php echo $data1["room_price"];?>
                 </option>
                 <?php
                 }
                ?>
              </select></label>
	      </dir> 

          <dir style="text-align:right;width:80%;">
            <input type="submit" value="จองห้องพัก">
            </dir>


            
        </form>

        <style>
          body{
            background-image: url('/roomhotel/room3.png');
            background-repeat: no-repeat;
            background-size: cover;

          }
          

        </style>
    </body>
</html>