$(window).ready(function(){

  $("#btnlogin").click(function(){

      var uname = $("#uname").val();
      var pword = $("#pword").val();

      if (uname == "" && pword == "") {
        alert("username and password required...");
      }

      $.ajax({
        url: "incs/getuserlogin.php",
        type: "POST",
        data:{uname: uname, pword: pword},
        success: function(data){
          if (data == 1) {
            location.href("dashboard.php");
          }
        }
      });
  });

  $(".tbl").on("change", "input", function (e) {  //use event delegation

    var tableRow = $(this).closest("tr");  //from input find row
    var one = Number(tableRow.find(".itemqty").val());  //get first textbox
    var two = Number(tableRow.find(".itemprice").val());  //get second textbox
    var total = one * two;  //calculate total
    tableRow.find(".itemamount").val(total);  //set value

    calcTotal();
    totalpayable();

  });
 
  function calcTotal(){
    var sum = 0;
    $(".itemamount").each(function(){
      sum += parseFloat($(this).val());
    });
    $('.ttlamount').val(sum);
  }

  function totalpayable(){
    var ttl = Number($(".ttlamount").val());

    $(".ttlvalue").val(ttl);

  }

  $("button.add").on("click", function(e) {
        e.preventDefault();
     var tbody = $(".tbl tbody");
     tbody.find("tr:eq(0)").clone().appendTo(tbody).find("input").val("");
  });

  $(".tbl").on("change", "input, select", function(e){
    e.preventDefault();
    var tableRow = $(this).closest("tr");  //from input find row
    var desc = tableRow.find(".itemdesc").val();
    var desc2 = tableRow.find(".itemdesc");
    var hscode = tableRow.find(".itemhscode");
    var price = tableRow.find(".itemprice"); //get first textbox

    $.ajax({
      url:"incs/getproductelem.php",
      type:"post",
      data:{desc:desc},
      dataType: "JSON",
      success: function(res){
        $(desc2).val(res.description);
        $(hscode).val(res.hscode);
        $(price).val(res.price);
      
        console.log(res);

      }
    });
  });


  $("#invto").change(function(){
    var customer = $("#invto").val();
    $.ajax({
      url:"incs/getaddress.php",
      type:"post",
      data: {customer:customer},
      dataType: "JSON",
      success: function(res){
        //$("#invto").val(res.fullname);
        $("#invtoad").val(res.address +', '+ res.country);

        console.log(customer);
        console.log(res);
      }
    });
  });

  $(".selectfreight").change(function(e){
    e.preventDefault(e);
    var value = $(".selectfreight").val();
    if (value == 'Yes') {
      $(".isfreightyes").css("display", "block");
    }else{
      $(".isfreightyes").css("display", "none");
    }
  });

  $(".selectinsurance").change(function(e){
    e.preventDefault(e);
    var value = $(".selectinsurance").val();
    if (value == 'Yes') {
      $(".isinsuranceyes").css("display", "block");
    }else{
      $(".isinsuranceyes").css("display", "none");
    }
  });

  $(".mos").change(function(e){
    e.preventDefault(e);
    var value = $(".mos").val();
    
    if (value == 'By Air' || value == 'By DHL Courier' || value == 'By UPS Courier') {
      $(".awbyes").css("display", "block");
      $(".blyes").css("display", "none");
    }
    
    if (value == 'By Sea') {
      $(".awbyes").css("display", "none");
      $(".blyes").css("display", "block");
    }

  });

  $(".addpo").on("click", function(e){

    e.preventDefault();

    var poNo = $(".pono").val();
    var poDate = $(".podate").val();
    var poClient = $(".poclient").val();
    var poDesc = $(".podesc").val();
    var poQty = $(".poqty").val();

    if (poNo != '' && poDate != '' && poClient != '' && poDesc != '' && poQty != '') {
      $.ajax({
        url:"incs/savepo.php",
        type:"post",
        data{
          
        },
        success function(res){

        }
      });
    }else{
      alert("all fields are mandatory.");
    }

  });



  $(".mgssucc").hide(3500);
  $(".msgerr").hide(3500);


});