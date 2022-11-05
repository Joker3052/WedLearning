<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
  .edit{
      width: 100%;
      height: 25px;
  }
  .editMode{
      border: 1px solid black;
  }
  table {
      border:3px solid lavender;
      border-radius:3px;
  }
  table tr:nth-child(1){
      background-color:dodgerblue;
  }
  table tr:nth-child(1) th{
      color:white;
      padding:10px 0px;
      letter-spacing: 1px;
  }
  table td{
      padding:10px;
  }
  table tr:nth-child(even){
      background-color:lavender;
      color:black;
  }

    </style>
</head>
<body>
    

<?php include "config.php"; ?>
  <div class='container'>
    <table width='100%' border='0'>
      <tr>
        <th width='10%'>ID</th>
        <th width='40%'>Username</th>
        <th width='40%'>Name</th>
      </tr>
      <?php 
        $query = "select * from users order by name";
        $result = mysqli_query($conn,$query);
        $count = 1;
        while($row = mysqli_fetch_array($result) ){
          $id = $row['id'];
          $username = $row['username'];
          $name = $row['name'];
       ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td> 
               <div contentEditable='true' class='edit' id='username_<?php echo $id; ?>'> 
                 <?php echo $username; ?>
               </div> 
            </td>
            <td> 
               <div contentEditable='true' class='edit' id='name_<?php echo $id; ?>'>
                 <?php echo $name; ?> 
               </div> 
            </td>
         </tr>
      <?php
         $count ++;
        }
      ?> 
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
    $('.edit').click(function(){
      $(this).addClass('editMode');
    });

    $(".edit").focusout(function(){
      $(this).removeClass("editMode");
      var id = this.id;
      var split_id = id.split("_");
      var field_name = split_id[0];
      var edit_id = split_id[1];
      var value = $(this).text();

      $.ajax({
         url: 'update.php',
         type: 'post',
         data: { field:field_name, value:value, id:edit_id },
         success:function(response){
            console.log('Save successfully');
         }
       });

    });
  });
</script>
 </div>
 </body>
</html>