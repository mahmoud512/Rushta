var x = 1 ;
$(".add").click(function(e){
  e.preventDefault();
  if (x < 50) {
    x++
    $(".ad").append("hjh")
  }
})