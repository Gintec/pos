// SIDEBAR
$(document).ready(function(){
    $("#item").focus();

    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens
      }
    );
    // START OPEN
    $('.button-collapse').sideNav('hide');   

    //INITIALIZE SELECT2
    
    $('#search_product').select2({width: "100%"});

    $('#keyword').select2({width: "100%"});

    $('select').material_select();
    
    // INITIALIZE DATATABLES
    $('#example').DataTable( {
      "order": [[ 0, "desc" ]],
      columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );

    $('.page-link').addClass('btn btn-small');

     // INITIALIZE DATATABLES
     $('#products').DataTable({
        "order": [[ 0, "asc" ]],
        "paging": false,
        "pageLength": 50,
        "filter": true,
        deferRender: true
       
      });

    //$('a.paginate_button').addClass('btn');

    // INITIALIZE TOOL TIP
    $('.tooltipped').tooltip();

    // INITIALIZE DATEPICKER



    // NEW SALES ITEM

    $('.add_item').click(function(){
        addItem("");
        reCalc();
        $("#search_product").focus();
    });

    $("#quantity").on('keyup', function (e) {
        if (e.keyCode == 13) {
            addItem("");
            reCalc();
            $("#search_product").focus();
        }
    });

    $("#unit_cost").on('input','keyup', function (e) {
        if (e.keyCode == 13) {
            addItem("");
            reCalc();
            $("#search_product").focus();
        }
    });

    // PREVENT SUBMIT ON ENTER
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
        event.preventDefault();
        return false;
        }
    });
    

    $("#tax").on('input', function(){
        var tax = $("#tax").val();
        var sum = $("#total_due").val();
        var total_discount = $("#total_discount").val();
        if(total_discount==""){total_discount=0}
        if(tax==""){tax=0}
        var new_total = (parseFloat(sum)+parseFloat(tax)) - parseFloat(total_discount);  

        $("#total_due").val(new_total.toFixed(2));
        reCalc();
    });

    $("#notearea").toggle();

    $("#add_notes").click(function(){
        $("#notearea").toggle();
    });
    $('.modal').modal();

    $('textarea#message').characterCounter();


    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        isRTL: true,
        format: 'yyyy-mm-dd',
        closeOnSelect: true // Close upon selecting a date,
   });

   $('.datepicker').on('mousedown',function(event){
        event.preventDefault();
    });
    
    $('#sales_form').each(function(){
        this.reset();
    });

   
    
}); // END DOCUMENT READY

function delItem(id,table){
    $.ajax({
        type: "POST",
        url: '/delete_item', // This is what I have updated
        data: { id: id, table: table }
    }).done(function( result ) {
        alert( result );
    });
}

$("#item").keyup(function (e) {
    if (e.keyCode == 13) {
        var product_id = $(this).val();
        var all_products = $("#allproducts").val();
        var all_items = $.parseJSON(all_products); 
        var product = all_items.filter( obj => obj.product_id === product_id)[0];
        addItem(product);
        reCalc();
        $("#item").val("").focus();           
    }
});


$('#quantity_returned').on('input', function(){
    
    var sp = $('#selling_price').val();
    var qs = $('#quantity_sold').val();
    var qr = $('#quantity_returned').val();
    var up = sp/qs;

    var ar = qr*up;

    $('#amount_returned').val(ar);
});

// ADD ITEM FUNCTION
function addItem(item){
    var product_item = $("#search_product").val();
    var quantity = $("#quantity").val();
    if(item==""){
    var item = $.parseJSON(product_item);   
    }
    var product_id = item['product_id'];
    var product_name = item['product_name'];
    var selling_price = item['selling_price'];

    var item_class = $(".add_item").attr("id");
      var old_class = parseFloat(item_class);
      new_class = old_class+1;
      
    $(".add_item").prop('id', new_class);

    var amount = parseFloat(quantity)*parseFloat(selling_price);
    amount = amount.toFixed(2);
    selling_price = parseFloat(selling_price).toFixed(2);

    $("table tbody#item_list").append("<tr scope='row' class='row"+new_class+"'><td class='input-field'><input type='hidden' name='product_id[]' value='"+product_id+"' readonly>"+product_name+"</td><td class='input-field'><input type='number' onChange='changeAmount("+new_class+")' name='quantity_sold[]' class='qty' id='qty"+new_class+"' value='"+quantity+"' min='1'></td><td class='input-field'><input type='number' name='unit_cost[]' oninput='changeUc("+new_class+")' class='unit_cost' id='unit"+new_class+"' value='"+selling_price+"'></td><td class='input-field'><input type='number' name='amount[]' class='amount' id='amount"+new_class+"' value='"+amount+"' min='0' maxchar='9' readonly></td><td class='input-field'><input type='number' name='item_discount[]' class='item_discount' value='0' min='0' oninput='reCalc()'> <a href='#' class='btn-floating red btn-small delpos' onClick='delRow("+new_class+")'><i class='small material-icons'>remove</i></a></td></tr>");

    $('#payarea').css('display', 'block');
    
  };

function changeAmount(clicked){
    // RECALCULATE AMOUNT OF ONE ITEM ON QUANTITY CHANGE
    var qty = $("#qty"+clicked).val();
    var unit_rate = $("#unit"+clicked).val();
    var new_amount = parseFloat(qty)*parseFloat(unit_rate);
    $("#amount"+clicked).val(new_amount.toFixed(2));
    reCalc();
}

function changeUc(clicked){
    // RECALCULATE AMOUNT OF ONE ITEM ON QUANTITY CHANGE
    var uc = $("#unit"+clicked).val();
    var qty = $("#qty"+clicked).val();
    
    var new_amount = parseFloat(qty)*parseFloat(uc);
    $("#amount"+clicked).val(new_amount.toFixed(2));
    reCalc();
}
  
function reCalc(){
    // RECALCULATE TOTAL AMOUNT
    var sum = 0;
    $(".amount").each(function(){
        sum += +$(this).val();
    });
    $("#total_due").val(sum.toFixed(2));
    

    // RECALCULATE TOTAL DISCOUNT
    var total_discount = 0;
    $(".item_discount").each(function(){
        total_discount += +$(this).val();
    });
    $("#total_discount").val(total_discount.toFixed(2));

    var tax = $("#tax").val();
    var total_discount = $("#total_discount").val();

    var new_sum = (parseFloat(sum)+parseFloat(tax)) - parseFloat(total_discount);

    $("#total_due").val(new_sum.toFixed(2));

    $("#amount_paid").val($("#total_due").val());

}

function delRow(rownum){    
    $(".row"+rownum).remove();
    reCalc();
};

function addnumber(num){
    var all_num = $("#recipients").val();
    var new_num = $("#"+num).val();
    all_num = all_num+","+new_num;

    $("#recipients").val(all_num);
}