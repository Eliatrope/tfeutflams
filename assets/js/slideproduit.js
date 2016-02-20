$(document).ready(function(){
	$('.detailproduit').hide();
	$(document).on('click','.buttonproduct',function(){
		var val=$(this).val();
		
		if(val==2){
			$('.detailproduit').show();
			$('.detailproduit :not(.flams-2)').hide();
			$('.detailproduit .flams-2').show();
			$('.detailproduit br').show();//Exception <br>
		}else{
			$('.detailproduit').show();
			$('.detailproduit .flams-'+val+'').show();
			$('.detailproduit :not(.flams-'+val+')').hide();
			$('.detailproduit br').show();//Exception <br>
		}
		/*$(document).on('click','.content h3.num-'+val+'',function(){
			$('.content div.num-'+val+'').fadeIn('slow');
			$('.content div img.num-'+val+'').fadeIn('slow');
			$('.content div:not(.num-'+val+')').fadeOut('slow');
			$('.content div img:not(.num-'+val+')').fadeOut('slow');
		});
		$(document).on('click','.content div.num-'+val+' div.closetoila',function(){
			$('.content div.num-'+val+'').fadeOut('slow');
			
		});*/
	});
		
});