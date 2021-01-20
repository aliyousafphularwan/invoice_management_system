$(window).ready(function(){
  var counter = 0;

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
    var price = tableRow.find(".itemprice");  //get first textbox

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

  // $(".tbl").on("keyup", ".itemdesc", function(e){
  //     e.preventDefault();
  //     var tableRow = $(this).closest("tr");  //from input find row
  //     var desc = tableRow.find(".itemdesc").val();

  //     console.log(desc);

  //     $.ajax({
  //       url: "incs/productlivesearch.php",
  //       type: "post",
  //       data: {desc:desc},
  //       dataType: "JSON",
  //       success: function(res){

  //         var len = res.length;
  //         $(".plist").empty();
  //         for (var i = 0; i < len; i++) {
  //           $(".plist").append("<li>"+res[i]+"</li>");
  //         }

  //         // $(".itemdesc").val(res);
  //         // console.log(res);
  //       }
  //     });

  // });

  $("#invto").change(function(){
    var customer = $("#invto").val();
    $.ajax({
      url:"incs/getaddress.php",
      type:"post",
      data: {customer:customer},
      dataType: "JSON",
      success: function(res){
        $("#invto").val(res.fullname);
        $("#invtoad").val(res.address);

        console.log(customer);
        console.log(res);
      }
    });
  });

  function getclientlist(){
    $.ajax({
      url:"incs/getclientlist.php",
      type:"post",
      success:function(data){
        $("#clients-list").html(data);
      }
    });
  }

  function getproductlist(){
    $.ajax({
      url:"incs/getproductlist.php",
      type:"post",
      success:function(data){
        $("#getproductlist").html(data);
      }
    });
  }

  // $("#save-invoice").click(function(){
  //   var invtype = $("#invtype").val();
  //   var invno = $("#invno").val();
  //   var invdate = $("#invdate").val();
  //   var itempo = [];
  //   var itemdesc = [];
  //   var itemhscode = [];
  //   var itemqty = [];
  //   var itemprice = [];
  //   var itemamount = [];

  //   $("#itempo").each(function(){
  //     itempo.push($(this).text());
  //   });
  //   $("#itemdesc").each(function(){
  //     itemdesc.push($(this).text());
  //   });
  //   $("#itemhscode").each(function(){
  //     itemhscode.push($(this).text());
  //   });
  //   $("#itemqty").each(function(){
  //     itemqty.push($(this).text());
  //   });
  //   $("#itemprice").each(function(){
  //     itemprice.push($(this).text());
  //   });
  //   $("#itemamount").each(function(){
  //     itemamount.push($(this).text());
  //   });

  //   $.ajax({
  //     url:"incs/saveinvoice.php",
  //     method:"post",
  //     data:{invtype:invtype,invno:invno,invdate:invdate,itempo:itempo,itemdesc:itemdesc,itemhscode:itemhscode,itemqty:itemqty,itemprice:itemprice,itemamount:itemamount},
  //     success:function(res){
  //       alert("message: "+res);
  //     }
  //   });

  // });

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


  $("button.btn-add-more").on("click", function(e) {
    e.preventDefault();
     var tbody = $(".tbl-pack tbody");
     tbody.find("tr:eq(0)").clone().appendTo(tbody).find("input").val("");
  });


  $(".mgssucc").hide(3500);
  $(".msgerr").hide(3500);

  getclientlist();
  getproductlist();

});