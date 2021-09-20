$(document).ready(function() {
	// $('.remove-cart-product').click(function() {
	// 	var id = $(this).attr('identity');
	// 	// console.log(id)
	// 	$.ajax({
	// 		url : 'remove-cart-product',
	// 		type: 'post',
	// 		data: {id: id},
	// 		success:function(data){
	// 			console.log(data)
	// 		},
	// 		error:function(a,b,c){
	// 			console.log(b)
	// 		}
	// 	});

	// });

	// FOR HEADER
	res = 0;
	$('.sub-total').each(function() {
		res += parseInt($(this).text());
	});
	var t = $('#total').text(res); 

	// FOR CART
	total = 0;
	$('.sub').each(function() {
		total += parseInt($(this).text());
	});
	var tot = $('#tot').text(total);


	t = 0;
	$('.sub').each(function() {
		t += parseInt($(this).text());
	});
	var tot = $('.tot').val(t);

});

function updateProductQty(product_id){
	var product_qty = $('#product-quantity-'+product_id).val();
	var product_price = $('#product-price-'+product_id).text();
	var sub_total = product_qty * product_price;
	var sub = $('#sub-'+product_id).text(sub_total);
	
	$.ajax({
		url : 'update-cart/'+product_id,
		type: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			_token: $('#token').val(),
			product_id: product_id,
			product_qty: product_qty
		},
		success:function(data){
			// console.log(data)
		},
		error:function(a,b,c){
			console.log(b)
		}
	});

	var total = 0;
	$('.sub').each(function() {
		total += parseInt($(this).text());
		// console.log(total)
	});
	$('#tot').text(total);
}


function login() {
	alert('login To Buy Products.')
}