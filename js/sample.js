$("#tital").keyup(function(){
      var query = $(this).val();
        if(query != '')
        {
         $.ajax({
         method  : "POST",
          url  : "{{url('/export/bookingsale/fetch')}}",
          data :  {"_token":"{{ csrf_token() }}",'query':query},
          success:function(data){
          $('#productList').fadeIn();  
          $('#productList').html(data);
          }
         });
        }
    });
    $(document).on('click', '.product_li','a', function(){  
        var product_id = $(this).attr('id');
        var tital = $(this).attr('product');
        var engin_no = $(this).attr('engin');
        var chassis_no = $(this).attr('cheisis');
        var qty = 1;
        var price = $(this).attr('name');

        $('#rows').append(
              '<tr>'+
              '<th style="display:none"><input type="text" name="product_id" id="product_id" class="sub-total form-control1" readonly="" value='+product_id+'></th>'+
              '<th style="display:none"><input type="text" name="p_id" id="p_id" class="sub-total form-control1" readonly=""></th>'+
              '<th style="display:show"><input style="width:300px" type="text" name="p_tital" id="p_tital" class="sub-total form-control1" readonly="" value='+tital+'></th>'+
              '<th style="display:show"><input style="width:100px" type="text" name="e_no" id="e_no" class="sub-total form-control1" readonly="" value='+engin_no+'></th>'+
              '<th style="display:show"><input style="width:100px" type="text" name="c_no" id="c_no" class="sub-total form-control1" readonly="" value='+chassis_no+'></th>'+
              '<th style="display:show"><input style="width:50px" type="text" name="qty" id="qty" class="sub-total form-control1" value='+qty+'></th>'+
              '<th style="display:show"><input style="width:100px" type="text" name="price" id="price" class="sub-total form-control1" readonly="" value='+price+'></th>'+
              '<th style="display:show"><input type="text" name="total_amount" id="total_amount" class="sub-total form-control1" readonly="" value='+parseInt(qty)*parseInt(price)+'></th>'+
              '<th width="50px"><button type="button" id="'+i+'"class="remove_line btn-danger btn-sm">-</button></th>'+
              '</tr>'
              
              );
            calc_total();
            $('#productList').fadeOut();
            $('#tital').val('');
    });

    // RewriteRule ^Products/([a-zA-Z_'-]+)([a-zA-Z]+)([^/]+) shop.php?id=$1