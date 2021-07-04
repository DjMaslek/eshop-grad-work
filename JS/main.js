$('.buy').click(function(){
    let price = $(this).data('price'),
    product = $(this).data('product');
    $('#price').val(price);
    $('#product').val(product);
    $('#buyingModal').modal('show');
    return false;
});