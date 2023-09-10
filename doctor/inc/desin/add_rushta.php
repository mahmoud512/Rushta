
<style>
  .add{
     border-radius: 50%;
     font-size: 30px;
      font-weight: 900;
      color: white;
       display: flex;
       width: 30px;
        height: 30px;
         background-color: red;
       margin-top: 10px;
       margin-right: 20px;
       justify-content: center;
       align-items: center;
  }
  .remov{
     border-radius: 50%;
     font-size: 30px;
      font-weight: 900;
      color: white;
       display: flex;
       width: 30px;
        height: 30px;
         background-color: black;
       margin-top: 10px;
       margin-right: 20px;
       justify-content: center;
       align-items: center;
  }
</style>
<form style="direction: rtl; text-align: right;"  action="inc/fun/bo_add_rushta.php" method="POST">
    <div class="row">
  <br>
    <div class="col-md-6">
    <label for="inputCity" class="form-label">اسم الدواء :</label>
    <input list="n" name="name[]" class="form-control" id="inputCity">
    <datalist id="n">
      <?php
  $sql = "SELECT * FROM special";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    ?>
      <option value="<?=$row["name"]?>">
      <?php
          }
        ?>
    </datalist>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">موعد اخذ الجرعة :</label>
      <select id="inputState" name="time[]" class="form-select form-control">
        <?php
          $sql = "SELECT * FROM time_special";
          $result = $con->query($sql);
          while ($row = $result->fetch_assoc()) {
            ?>
              <option><?=$row["name"]?></option>
            <?php
          }
        ?>
      </select>
    </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">عدد الجورعات :</label>
    <input type="number" value="1" name="num[]" min="1" class="form-control" id="inputZip">
  </div>
  <div class="col-md-1">
    <br>
    <a href="#" class="add" > + </a>
  </div>
  <div class="ad col-md-12">
    
    </div>
  </div>
  <div class="col-md-12">
    <br>
    <label for="inputZip" class="form-label">الملاحظات :</label>
  <textarea name="desc" class="form-control" cols="30" rows="7"></textarea>
</div>
<input type="hidden" name="patient_id" value="<?php
echo $patient_id = $_GET['patient_id'];
?>">
<div class="col-md-12" style="text-align: left;">
  <br>
  <input type="submit" class="btn btn-primary" value="Send">
</div>
 </form> 
 <script>
  var x = 1 ;
$(".add").click(function(e){
  e.preventDefault();
  if (x < 50) {
    x++
    $(".ad").append('<div class="x"><div class=" row del"> <div class="col-md-6"> <label for="inputCity" class="form-label">اسم الدواء :</label> <input list="n" name="name[]" class="form-control" id="inputCity"> <datalist id="n"> <?php $sql = "SELECT * FROM special"; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { ?> <option value="<?=$row["name"]?>"> <?php } ?> </datalist> </div> <div class="col-md-3"> <label for="inputState" class="form-label">موعد اخذ الجرعة :</label> <select id="inputState" name="time[]" class="form-select form-control"> <?php $sql = "SELECT * FROM time_special"; $result = $con->query($sql);  while ($row = $result->fetch_assoc()) { ?> <option><?=$row["name"]?></option> <?php } ?></select> </div><div class="col-md-2"> <label for="inputZip" class="form-label">عدد الجورعات :</label><input type="number" name="num[]" value="1" min="1" class="form-control" id="inputZip"></div><div class="col-md-1"><br><a href="#" class="remov" > - </a></div> </div></div>')
  }
});
$(".ad").on("click",".remov",function(){
  $(this).parents('.x').remove();
  x--;
})
 </script>