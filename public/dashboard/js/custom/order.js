$(document).ready(function () {
    
    $('.add-product-btn').on('click',function(e){
        
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $(this).data('price');
        
        $(this).removeClass('btn-success').addClass('btn btn-default disabled');

        var html = 
        `
        <tr>
            <td>${name}</td>
            <td><input type="number" name="quantities[]" data-price="${price}" class="form-control product-quantity" min="1" value="1"></td>
            <td class="product-price">${price}</td>
            <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><i class="fa fa-trash"></i></button></td>
        </tr>
        `;

        $('.order-list').append(html);
        calculateTotal();

    });

    $('body').on('click','.disabled',function(e){

        e.preventDefault();

    });//end of disabled

    $('body').on('click','.remove-product-btn',function(e){

        e.preventDefault();
        var id =$(this).data('id');

        $(this).closest('tr').remove();

        $('#product-'+id).removeClass('btn-default disabled').addClass('btn-success');

        calculateTotal();
    });//end of remove-product-btn

    //change total when change quantity
    $('body').on('keyup change','.product-quantity',function(){

        var quantity = parseInt($(this).val());
        var unitPrice = $(this).data('price');
        var productPrice = parseInt($(this).closest('tr').find('.product-price').html(quantity*unitPrice));;
        
        calculateTotal();
        
    });

}); 

//calculate total
function calculateTotal(){

    var price = 0;
    $('.order-list .product-price').each(function(index){
        price += parseInt($(this).html());
    });//end of product price

    $('.total-price').html(price);

    if(price > 0){
        $('#add-order').removeClass('disabled');
    }else{
        $('#add-order').addClass('disabled');
    }

}//end of calculate total