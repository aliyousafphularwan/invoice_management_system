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

  $("#btn-add-more-products").click(function(e){

    e.preventDefault();
    var html = '<tr>';
        html += '<td><input type="text" id="itempo" name="itempo[]" placeholder="PO #" class="form-control"></td>';       
        html += '<td><input type="text" id="itemdesc" name="itemdesc[]" placeholder="Description" class="form-control"></td>';       
        html += '<td><input type="text" id="itemhscode" name="itemhscode[]" placeholder="HS Code" class="form-control"></td>';       
        html += '<td><input type="text" id="itemqty" name="itemqty[]" placeholder="qty" class="form-control"></td>';        
        html += '<td><input type="text" id="itemprice" name="itemprice[]" placeholder="Unit Price" class="form-control"></td>';       
        html += '<td><input type="text" class="form-control" placeholder="amount" name="itemamount[]" id="itemamount"></td>'; 
        html += '</tr>';

    $("#tbl-items-append").append(html);

  });

  $("#itemprice").change(function(e){
    
    e.preventDefault();
    
    var qty = $("#itemqty").val();
    var price = $("#itemprice").val();
    var mult = qty*price;

    $("#itemamount").val(mult);

    console.log(mult);

  });

  // var cloned = $('#tbl-items-append tr:last').clone();
  //   $("#btn-add-more-products").click(function (e) {
  //       e.preventDefault();
  //       cloned.clone().appendTo('#tbl-items-append'); 
  //   });

  $("#invto").change(function(){
    var customer = $("#invto").val();
    $.ajax({
      url:"incs/getaddress.php",
      type:"post",
      data: {customer:customer},
      success: function(res){
        $("#invtoad").val(res);
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

  $("#save-invoice").click(function(){
    var invtype = $("#invtype").val();
    var invno = $("#invno").val();
    var invdate = $("#invdate").val();
    var itempo = [];
    var itemdesc = [];
    var itemhscode = [];
    var itemqty = [];
    var itemprice = [];
    var itemamount = [];

    $("#itempo").each(function(){
      itempo.push($(this).text());
    });
    $("#itemdesc").each(function(){
      itemdesc.push($(this).text());
    });
    $("#itemhscode").each(function(){
      itemhscode.push($(this).text());
    });
    $("#itemqty").each(function(){
      itemqty.push($(this).text());
    });
    $("#itemprice").each(function(){
      itemprice.push($(this).text());
    });
    $("#itemamount").each(function(){
      itemamount.push($(this).text());
    });

    $.ajax({
      url:"incs/saveinvoice.php",
      method:"post",
      data:{invtype:invtype,invno:invno,invdate:invdate,itempo:itempo,itemdesc:itemdesc,itemhscode:itemhscode,itemqty:itemqty,itemprice:itemprice,itemamount:itemamount},
      success:function(res){
        alert("message: "+res);
      }
    });

  });

  

  $("#selectfreight").change(function(e){
    e.preventDefault(e);
    var value = $("#selectfreight").val();
    alert(value);
  });


  $('input#itemdesc').click(function() {
      alert($(this).attr('id'));
  });

  getclientlist();
  getproductlist();

});