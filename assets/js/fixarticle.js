//Ici on check la hauteur de la div pour savoir si l'image dépasse ou non de cette dernière.

$(document).ready(function(){
	var container = $('.containeractuarticle').height();
	if(container < 370){
		$('.mainimage').css('width','150px');
	}
});