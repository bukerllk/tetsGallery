

$(document).ready( function(){
	var url = "example.com/images.php/"

	$(document).ready( function(){
      // obtenemos el valor del campo de búsqueda, el que contiene el texto de la misma
      var user_id = $("#user_id").val();

      // hacemos uso del soporte de Ajax que evalua el resultado como un objeto JSON, pasándole como parámetro la url del
      // servicio web de flickr, asignando el texto de la búsqueda. El segundo parámetro de la función es un método de callback
      // que se ejecutará tras la respuesta del servicio y que recibe el objeto JSON en el parámetro data.
      $.getJSON(url+"?user_id="+tags,
      	function(data){
      	//Cargamos los datos del usuario 
      	 var user=data.user;
      	$(".profileImg").html('<img src="'+user.path+'" />');
      	$(".nameUser").html(user.name);
      	$(".descriptionUser").html(user.description);
      	$(".phoneUser").html(user.phone);
      	$(".emailUser").html(user.email);


          // limpiamos el contenedor del resultado de la búsqueda.
          $(".cards").empty();
          var images=data.images;	
          // por cada uno de los items que contiene el objeto JSON obtenido invoca a una función que recibe el ordinal y el propio item
          $html='';
          $.each(images, function(i,item){
          	$html+='<div class="col-xs-12 col-sm-6 col-md-4">';
          	$html+='   <div class="cont_card">';
          	$html+='       <div class="img_card"><img src="'+item.path+'" /> <h2>'+item.name+'</h2></div>';
          	$html+='       <div class="row">';
          	$html+='           <div class="col-md-12">';
          	$html+='               <p>'+item.description+'</p>';
          	$html+='           </div>';
          	$html+='           <div class="col-md-3"><img src="'+item.like+'" /></div>';
          	$html+='          <div class="col-md-9 date">'+item.date+'</div>';
          	$html+='       </div>';
          	$html+='   </div>';
          	$html+='</div>';

            // cortamos el proceso al llegar a 20 imágenes
            if ( i == 20 ) return false;
        });
          // cargamos la galeris
          $(".cards").html(html);
      });
      


   // registramos sobre el nodo imagen que mostrará la actividad el comportamiento de mostrarse
   // cuando exista una petición activa
   $("#loading").ajaxStart(function(){
   	$(this).show();
   });

   // del mismo modo, cuando termine una petición se ocultará
   $("#loading").ajaxComplete(
   	function(event,request, settings) {
   		$(this).hide();
   	}
   	);
   
});