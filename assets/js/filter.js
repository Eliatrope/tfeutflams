$(document).ready(function(){
	$(document).on('change','.filtre',function(){
		var val=$(this).val();
		//alert (val);
		/*if(val==0){
			$('script:not(.'+val+')').css('display','none');
		}else{
			$('script:not(.'+val+')').css('display','none');
			$('script.'+val).css('display','block');
		}*/
		var d = new Date();
			
			var today = d.getFullYear() + "-" + d.getDate() + "-" + d.getMonth();
			var jplus1 = d.getFullYear() + "-" + (d.getDate()+1) + "-" + d.getMonth();
			var jplus2 = d.getFullYear() + "-" + (d.getDate()+2) + "-" + d.getMonth();
			var jplus3 = d.getFullYear() + "-" + (d.getDate()+3) + "-" + d.getMonth();
			var jplus4 = d.getFullYear() + "-" + (d.getDate()+4) + "-" + d.getMonth();
			var jplus5 = d.getFullYear() + "-" + (d.getDate()+5) + "-" + d.getMonth();
			var jplus6 = d.getFullYear() + "-" + (d.getDate()+6) + "-" + d.getMonth();
			var jplus7 = d.getFullYear() + "-" + (d.getDate()+7) + "-" + d.getMonth();
		
			
		
		if(val=='today'){
			$("div not:(."+val+")");
		}else if(val=='jplus1'){
			$("div not:(."+val+")");
		}else if(val=='jplus2'){
			$("div not:(."+val+")");
		}else if(val=='jplus3'){
			$("div not:(."+val+")");
		}else if(val=='jplus4'){
			$("div not:(."+val+")");
		}else if(val=='jplus5'){
			$("div not:(."+val+")");
		}else if(val=='jplus6'){
			$("div not:(."+val+")");
		}else if(val=='jplus7'){
			$("div not:(."+val+")");
		}else{
			$("div not:(."+val+")");
		}
		
	});
});