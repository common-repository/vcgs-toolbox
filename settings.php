<?php
/* +++
     AJUSTES GENERALES
	 +++ */


//include the main class file
  require_once("admin-page-class/admin-page-class.php");
  $pluginDir = plugin_dir_url( __FILE__ );
  
  /**
   * configure your admin page
   */
  $config = array(    
    'menu'           => array('top'=>'vcgs-toolbox'),             //sub page to settings page
    'page_title'     => 'Vcgs Toolbox',       //The name of this page 
    'capability'     => 'update_plugins',         // The capability needed to view the page 
    'option_group'   => 'vcgstb_options',       //the name of the option to create in the database
    'id'             => 'vcgstb',            // meta box id, unique per page
    'fields'         => array(),            // list of fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false,          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	'icon_url' => $pluginDir.'/img/admin-icon.png'
  );  
  
  /**
   * instantiate your admin page
   */
  $options_panel = new BF_Admin_Page_Class($config);
  $options_panel->OpenTabs_container('');
  
  /**
   * define your admin page tabs listing
   */
  $options_panel->TabsListing(array(
    'links' => array(
      'bienvenida' => 'Bienvenida',
      'general' =>  'General',
      'piopialo' =>  'Piopialo',
      'comentarios' => 'Comentarios',
	  'scrollytics' => 'Scrollytics',
      'bestcommenters' => 'Mejores comentaristas',
	 'sorteocomentaristas' => 'Sorteo Comentarios',
      'colaborar' =>  'Ayúdame !!',
	  'importexport' => 'Importar/Exportar'
    )
  ));
  /**
  * PESTAÑA DE BIENVENIDA
  **/
   $options_panel->OpenTab('bienvenida');
  //title
  $options_panel->Title('¡Gracias por Instalar Vcgs Toolbox!');
  //An optionl descrption paragraph
  $options_panel->addParagraph('<p>Muchas gracias por instalar esta caja de herramientas que he ido construyendo con mi esfuerzo y las sugerencias y geniales aportaciones de las personas que lo han usado y que visitan mi blog. <strong> Tu eres parte de esas personas, y mereces todo mi agradecimiento</strong>.</p><p>He añadido esta pestaña para contarte algunas novedades importantes con respecto al plugin y la comunidad. Por favor, échale un ojo con cada nueva actualización:</p><ul><li><a href="https://plus.google.com/communities/102985090241564199039" target="_blank"> La comunidad de usuarios de Vcgs Toolbox.</a> Hemos creado una comunidad en Google+ para usuarios de este plugin, moderada por <a href="http://ratonblogger.com/" target="_blank"> #Jerby </a> quien, desde siempre, ha sido una parte importante de este plugin y en mi blog. <strong>Te agradecería que te unieses a esta comunidad y participases con nuevas sugerencias o errores que te encuentres.</li><li><a href="https://www.paypal.me/vicampuzano" target="_blank">Si te apetece, hazme un donativo.</a> No es para nada obligatorio. Si usas este plugin y te gusta, con eso me basta. Ahora bien, si te apetece dejarme un pequeño donativo se convertirá en un chute de ilusión que me hará querer hacer más por este plugin. No creo que nunca lo ponga de pago...</li></ul>');
  $options_panel->CloseTab();	
  /**
  * PESTAÑA GENERAL
  */
  $options_panel->OpenTab('general');
  //title
  $options_panel->Title('Opciones generales de Vcgs Toolbox');
  //An optionl descrption paragraph
  $options_panel->addParagraph('En esta pesaña encontrarás varias opciones generales relativas a pequeñas funciones de Vcgs Toolbox..');
  // ACTIVAR FONTAWESOME
  $options_panel->addCheckbox('fa_activate',array('name'=> 'Incluir las librerías de Font Awesome', 
      'std' => false, 
	  'desc' => '<p>Esta sección se refiere a incluir o no los scripts de Font Awesome que te permitirán usar la nomenclatura  para mostrar iconos de Font Awesome en tus posts. Puedes ver un vídeo y ejemplos en mi post: <a href="http://www.vcgs.net/blog/posticoning-mejorar-aspecto-posts-con-iconos/" target="_blank">Posticoning</a>.</p>'));
	  
	  // MIDENLACE
	  $options_panel->addCheckbox('me_activate',array('name'=> 'Activar el Shortcode Midenlace', 
      'std' => false, 
	  'desc' => '<p>El shortcode <code>[midenlace]</code> te ayuda a controlar los clics que se producen en un enlace de tu web registrándolos como eventos en Google Analytics. Es muy sencillo de utilizar y te puede ayudar a tener información adicional en enlaces de afiliación ya que podrías conectar datos de tus usuarios (de dónde llegan, qué hacen, etc.) que pinchan sobre enlaces de afiliado (o de descarga o de lo que desees). Revisa <a href="http://www.vcgs.net/blog/midenlace-registra-clics-como-eventos-en-google-analytics/" target="_blank">este artículo</a> para más información.</p>'));
	  // CONTADOR DE PALABRAS
	  $options_panel->addCheckbox('copa_activate',array('name'=> 'Activar la columna "Contador de Palabras"', 
      'std' => false, 
	  'desc' => '<p>Se refiere a si deseas activar la columna contadora de palabras en tu panel de adminsitración. Si lo activas, cuando vayas a Entradas, verás una columna que te dice cuántas palabras tiene cada post. Es ideal, por ejemplo, para comparar el número de comentarios con la longitud de los posts de un rápido vistazo. También te puede servir para ver la evolución que están teniendo tus posts.</p>'));
	  // FEATURED IMAGE
	  $options_panel->addCheckbox('feati_activate',array('name'=> 'Añadir la imagen destacada al Feed"', 
      'std' => false, 
	  'desc' => '<p>Se refiere a si quieres activar la función por la cual <strong>vcgs-toolbox añadirá automáticamente la imagen destacada de tus posts a tu feed rss</strong>. Por defecto, la imagen destacada no está incluida en el cuerpo de un post cuando se consulta a través del feed, lo que puede provocar que tus posts no se vean muy bien cuando tus lectores usen Feedly o cualquier otro lector RSS. Activando esta opción te aseguras que la imagen destacada se insertará al principio de los posts y éstos se verán bien en las aplicaciones de los usuarios..</p>'));

      
  $options_panel->CloseTab();
  
   /**
  * PESTAÑA PIOPIALO
  */
  $options_panel->OpenTab('piopialo');
  //title
  $options_panel->Title('Piopialo - Buque insignia de Vcgs Toolbox');
  //An optionl descrption paragraph
  $options_panel->addParagraph('<p>Esta sección de la configuración se refiere a si incluir o no la función del <a href="http://www.vcgs.net/blog/piopialo-shortcode-para-tuitear-facilmente-frases-de-posts/" target="_blank">shortcode Piopialo</a>. Como puedes comprobar <a href="http://www.vcgs.net/blog/piopialo-shortcode-para-tuitear-facilmente-frases-de-posts/" target="_blank">en este post de mi blog</a>, el Piopialo es un shortcode que podrás usar para que tus lectores puedan fácilmente Tuitear frases destacadas de tus artículos..</p>
<p>El uso del piopialo es sencillo:</p>
<p>Encierra la frase que quieres que sea "piopiable" así: <code>[piopialo <opciones>]aquí la frase que quieres que sea clicable[/piopialo]</code>. Este sencillo código utilizará las opciones por defecto que puedes especificar aquí.</p>
<p>Además, para cada caso concreto (cada frase en concreto) puedes especifciar las opciones siguientes:</p>');
  // ACTIVAR PIOPIALO
  $options_panel->addCheckbox('pp_activate',array('name'=> 'Activar las funciones de Piopialo', 
      'std' => true, 
	  'desc' => 'Activa esta casilla si quieres que se registre el shortcode piopialo para que puedas utilizarlo en tu blog.'));
	  // LINKS LLEVAN A LA FRASE
	$options_panel->addCheckbox('pp_go',array('name'=> 'Links directos a la frase', 
      'std' => true, 
	  'desc' => '<p>Activa esta casilla si quieres que, por defecto, los links tuiteados lleven directamente al punto del post donde está la frase tuiteada. Este parámetro se puede sobre-escribir para cada caso concreto usando el parámetro <code>go="0"</code> (para desactivarlo) o <code>go="1"</code> (para activarlo). Si el valor es no, entonces los links llevan al principio del post.</p>'));
	  // LLAMADA A LA ACCIÓN
	  $options_panel->addText('pp_llamada', array('name'=> 'Texto de Llamada a la Acción', 
	  	'std'=> 'piopialo',
		'desc' => 'La llamada a la acción es el texto que aparecerá justo después de la frase a tuitear. Normalmente se usa piopialo, pero puedes escoger lo que queras. Este parámetro puedes especificarlo para cada frase usando el modificador <code>text="otra llamada"</code>'));
		//  TEXTO DE LA FIRMA
		$options_panel->addText('pp_via', array('name'=> 'Texto de la firma', 
	  	'std'=> 'via @vcgs_net',
		'desc' => 'La firma es el texto que aparecerá justo después de la frase y antes del link. Recuerda que debe ser lo más corto posible, pues los caracteres que uses en la firma no podrás usarlos en la frase. Este parámetro se puede sobreescribir para cada frase usando el modificador <code>via="firma"</code>.'));
		// ICONOS DE GOOGLE PLUS
		$options_panel->addCheckbox('pp_gplus',array('name'=> 'Activar iconos de Google Plus', 
      'std' => false, 
	  'desc' => '<p>Si quieres, puedes añadir un botón para compartir en Google Plus. Puedes sobreescribir esta configuración añadiendo el parámetro <code>vcgplus="1"</code> o <code>vcgplus="0"</code>.</p>'));
	  // ICONOS DE FACEBOOK
	  $options_panel->addCheckbox('pp_facebook',array('name'=> 'Activar iconos de Facebook', 
      'std' => false, 
	  'desc' => '<p>Si quieres, puedes añadir un botón para compartir en Facebook. Puedes sobreescribir esta configuración añadiendo el parámetro <code>vcfacebook="1"</code> o <code>vcfacebook="0"</code>.</p>'));
	  // ICONOS DE LINKEDIN
	  $options_panel->addCheckbox('pp_linkedin',array('name'=> 'Activar iconos de Linkedin', 
      'std' => false, 
	  'desc' => '<p>Si quieres, puedes añadir un botón para compartir en LinkedIn. Puedes sobreescribir esta configuración añadiendo el parámetro <code>vclinkedin="1"</code> o <code>vclinkedin="0"</code>.</p>'));
	  // SUBRAYAR AUTOMÁTICAMENTE LAS FRASES
	  $options_panel->addCheckbox('pp_underlined',array('name'=> 'Subrayar la frase', 
      'std' => true, 
	  'desc' => '<p>Aunque esta propiedad se puede establecer mediante CSS, si no quieres tocar la hoja de estilos de tu Theme, puedes marcar esta casilla y las frases aparecerán subrayadas.</p>'));
	  // ELIMINAR FIRMA DE POWERED BY VCGS TOOLBOX 
	  $options_panel->addCheckbox('pp_powered',array('name'=> 'Eliminar firma de Powered by Vcgs Toolbox', 
      'std' => false, 
	  'desc' => '<p>En los piopialos que van encerrados en cajas, se añade por defecto un enlace hacia el plugin. Si quieres puedes eliminarlo aunque, si lo dejas, contribuirás a que el plugin se descargue por más gente y yo te lo agradeceré mucho</p>'));
	  //CONVERTIR TAMBIÉN FRASES DE CLICK TO TWEET
	  $options_panel->addCheckbox('pp_ctt',array('name'=> 'Convertir también frases de Click To Tweet', 
      'std' => false, 
	  'desc' => '<p>Si usabas ClickToTweet, tendrás muchos posts con su nomenclatura para hacer frases tuiteables. Esta opción te permite convertir automáticamente las frases de ClickToTweet a piopialos en caja. <span style="color: red;">Atención:</span> Para que esto funcione, deberás activar esta opción y desactivar el plugin ClickToTweet. Mientras no desactives el plugin seguirán apareciendo las cajas de ClickToTweet. Si alguna vez deseas volver a ClickToTweet, sólo tendrás que activarlo y seguirán funcionando.</p>'));
	  
	  // SELECCIONAR EL TEMA PIOPIALO
	  $piothemes = array(
	  		'original' => 'Original',
			'reducido' => 'Reducido',
			'moderno' => 'Moderno',
			'modernoGris' => 'Moderno en Gris'
		);
	  $options_panel->addSelect('pp_theme',
	  						$piothemes,
							array('name'=> 'Tema por Defecto para la Caja', 
							'std'=> array('original'), 
							'desc' => 'Escoge la apariencia de los piopialos en caja. El primero, original, es más visual, con el icono de twitter y el texto más grande. El segundo, reducido, ocupa menos espacio y no lleva tanta decoración. El tema Moderno ofrece una caja con un azul intenso y una transición sutil de fondo. Por último, el Moderno en Gris, ofrece lo mismo que el anterior pero una transición más espectacular de fondo gris a Azul. Esta opción por defecto se puede sobrescribir en cada instancia con los parámetros <code>theme="original"</code> para el tema original, <code>theme="reducido"</code> para el reducido, <code>theme="moderno"</code> para el Moderno y <code>theme="modernoGris"</code> para el Moderno en Gris.'
		));
		
		  //Compartir y citar texto seleccionado
	  $options_panel->addCheckbox('pp_selector',array('name'=> 'Piopiar texto seleccionado', 
      'std' => false, 
	  'desc' => '<p>Si activas esta casilla, se ofrecerá a tus lectores la posibilidad de tuitear el texto que seleccionen de tu post.</p>'));
	  
	  
  $options_panel->CloseTab();
  
  /**
   * PESTAÑA SCROLLYTICS
   */
  $options_panel->OpenTab('scrollytics');
  //title
  $options_panel->Title('Scrollytics - Registra el Scroll que hacen tus usuarios');
  //An optionl descrption paragraph
  $options_panel->addParagraph('Al activar esta función, empezarás a ver como se registran en tu Google Analytics eventos que se corresponden a cuando un visitante llega a la parte superior de tu post (Baseline), cuando baja hasta superar el 25% del post, el 50 %, el 75 % y cuando llega hasta abajo del todo. Puedes ver más información acerca de esta función en este <a href="http://www.vcgs.net/blog/scrollytics-registrando-el-scroll-en-google-analytics/" target="_blank">post sobre Scrollytics</a> de mi blog.');
  //SCROLLYTICS --> Activar Scrollytics 
  $options_panel->addCheckbox('sc_activate',array('name'=> 'Activar Scrollytics', 
      'std' => false, 
	  'desc' => 'Activa esta casilla si quieres que se registre en Google Analytics el Scroll que hacen tus visitantes.'));
	//SCROLLYTICS --> Sólo en páginas y posts 
	$options_panel->addCheckbox('sc_single',array('name'=> 'Scrollytics sólo en Páginas y Posts', 
      'std' => true, 
	  'desc' => 'Activa esta casilla si quieres que sólo se registre el scroll en posts y páginas. Desactívala para registrar también páginas de autor, etiquetas, categorías, etc....'));
  //select field
  $options_panel->addParagraph('<p>Aquí te dejo un vídeo que publiqué donde se explica detalladamente cómo funciona esta función.</p><iframe width="100%" height="400px" src="https://www.youtube.com/embed/N3Q0HPVh2Qg" frameborder="0" allowfullscreen></iframe>');
  /**
   * Close first tab
   */   
  $options_panel->CloseTab();
  
  // PESTAÑA COMENATRIOS
  $options_panel->OpenTab('comentarios');
  //title
  $options_panel->Title('Comentarios - Potencia y Fomenta la comunicación');
  //An optionl descrption paragraph
  $options_panel->addParagraph('Aquí encontrarás algunas opciones y funciones que te ayudarán a potenciar los comentarios en tu blog..');
  // AÑADIR LINK DE TUITEAR COMENTARIOS
  $options_panel->addCheckbox('pp_tco',array('name'=> 'Añadir link para Tuitear Comentarios', 
      'std' => true, 
	  'desc' => 'Si activas esta opción, se añadirá también un enlace para que tus lectores puedan tuitear los comentarios que dejan entre sí. Además, si tienes instalado el plugin <a href="https://wordpress.org/plugins/twitter-comment-field/" target="_blank">Twitter Comment Field</a>, Vcgs Toolbox reconocerá el usuario de Twitter de quien comenta y lo mencionará en el tuit. Recuerda que esta opción solo causa efecto si tienes activada la función de Piopialo'));
    // AÑADIR LINK DE COMPARTIR COMENTARIOS EN FACEBOOK
  $options_panel->addCheckbox('pp_fco',array('name'=> 'Añadir Link para Citar comentarios en Facebook', 
      'std' => true, 
	  'desc' => 'Si activas esta opción, se añadirá también un enlace para que tus lectores puedan citar los comentarios que dejan entre sí, <strong>ahora también en Facebook</strong>.'));
  $options_panel->addCheckbox('pp_cal',array('name'=> 'Mostrar los links en la zona de Administración', 
      'std' => true, 
	  'desc' => 'Si activas esta opción, los links de citar comentario los tendrás disponibles también en la zona de Comentarios de tu administración de Worpress. Esto puede resultarte útil si quieres citar comentarios desde ahí pero a algunas personas le resulta molesto.'));
  // COMENTARIOS PENDIENTES DE RESPONDER
  $options_panel->addCheckbox('cope_activate',array('name'=> 'Activar la función de "Comentarios sin Responder"', 
      'std' => true, 
	  'desc' => 'se refiere a si quieres activar la funcionalidad de <strong>comentarios pendientes de responder</strong>. Basado en el plugin original <a href="https://wordpress.org/plugins/comments-not-replied-to/" target="_blank">"Comments Not Replied To"</a> que dejó de funcionar con la actualización 4.2 de Wordpress. Esta versión, además de incluir algunas mejoras, es 100 % compatible con la útlima actualización de Wordpress. <strong>Cuidado</strong>, no activar esta opción si tienes el plugin instalado y activado pues provocarás un conflicto.</p>
<p>Una vez activado, verás un filtro en la página de comentarios que te mostrará los comentarios pendientes de responder que tienes. Para mí es realmente útil.</p>'));
	// INTERVALOR PARA LOS COMENTARIOS PENDIENTES
	$intervalos = array(
	  		'1' => '1 Mes',
			'2' => '2 Meses',
			'3' => '3 Meses',
			'6' => '6 Meses',
			'12' => '12 Meses'
		);
	  $options_panel->addSelect('cope_interval',
	  						$intervalos,
							array('name'=> 'Antigüedad de Comentarios Pendientes', 
							'std'=> array('3'), 
							'desc' => 'Esta es la antiguedad máxima de comentarios para evaluar si están pendientes. Si no respondes un comentario pero es más antiguo que este número de meses, entonces no aparecerá en la lista..'
		));
		
		// REGISTRAR CADA COMENTARIO NUEVO EN ANALYTICS
		$options_panel->addCheckbox('analycome',array('name'=> 'Registrar comentarios en Analytics', 
      'std' => false, 
	  'desc' => 'Si quieres que se registre un Evento en Google Analytics cada vez que se produzca un nuevo comentario, de modo que puedas analizar el rendimiento de tus visitas y canales en términos de comentarios, entonces activa esta opción.'));
	  // COLOCAR LA CAJA DE COMENTARIOS AL PRINCIPIO DEL FORMULARIO
		$options_panel->addCheckbox('textareafirst',array('name'=> 'Empezar por el comentario', 
      'std' => false, 
	  'desc' => 'Si activas esta función, intentaremos mover la caja de comentarios al principio del formulario. Esto puede ser positivo y aumentar el número de comentarios. Función experimental.'));
  
  $options_panel->CloseTab();
  
  $options_panel->OpenTab('bestcommenters');
  function top_comment_authors($amount = 5, $dias=0) {
		global $wpdb;
		if ($dias > 0) { $datequery = ' AND comment_date BETWEEN CURDATE() - INTERVAL '.$dias.' DAY AND CURDATE() '; } else { $datequery = ''; }
		$results = $wpdb->get_results('
			SELECT
			COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
			FROM '.$wpdb->comments.'
			WHERE comment_author_email != "" AND comment_author_email != "'.get_option( 'admin_email' ).'" AND comment_type = "" AND comment_approved = 1 '.$datequery.'
			GROUP BY comment_author_email
			ORDER BY comments_count DESC, comment_author ASC
			LIMIT '.$amount
		);
		$output = "<ul>";
		foreach($results as $result) {
			$output .= "<li><a href=\"".$result->comment_author_url."\" target=\"_blank\">".$result->comment_author." (".$result->comments_count." comentarios)</a></li>";
		}
		$output .= "</ul>";
		return $output;
	}
	$options_panel->Title('¿Quieres conocer a tus comentaristas más activos?');
	$options_panel->addParagraph('<p>¿Sabes lo importantes que son los comentarios en tu blog? Seguro que si, que cada comentario te hará muchísima ilusión. <strong>Los comentaristas dan vida a un blog</strong>, son los lectores más valiosos que tienes. ¿Por qué no premiar a los más activos? Seguro que querrás agradecerles su fidelidad, ¿no?</p><p>Pues bien, lo primero que necesitas es conocer a los más activos de tu blog (por cantidad de comentarios). Aunque este sistema no es infalible, porque cuenta comentarios cuyo email coincida, te podrá ayudar a <strong>hacerte una idea de quienes son los comentaristas más activos de tu blog</strong>. Recuerda este post: <a href="http://www.vcgs.net/blog/como-ser-un-bloggin-hood/" target="_blank">Cómo ser un Blogging Hood</a>.</p><p><a href="'.admin_url().'/admin.php?page=vcgstb&showblogging=1">Pincha aquí para ver tus mejores comentaristas</a></p>');
	if (isset($_GET['showblogging'])) {
				$options_panel->addParagraph('<div style="float: left; width: 30%;"><h3>Del Último mes</h3>'.top_comment_authors(20,30).'</div>
																				 <div style="float: left; width: 30%;"><h3>Últimos 3 meses</h3>'.top_comment_authors(20,180).'</div>
																				<div style="float: left; width: 30%;"><h3>Desde siempre</h3>'.top_comment_authors(20,0).'</div>
						<div style="clear: both;"></div>');
	}
  $options_panel->CloseTab();
  
  $options_panel->OpenTab('sorteocomentaristas');
  function realizaSorteo() {
	  	global $wpdb;
		
		// Configfuraciones del sistema de plugins
		$adminemail = get_option('admin_email');
		$options = get_option('vcgstb_options');
		$stipo = intval($options['soco_tipo']);
		
		// Montamos la SQL
		if ($stipo > 0) {
			// Cada comentarista misma oportunidad
			$sql = 'SELECT DISTINCT comment_author, comment_author_email ';
		} else {
			// Cada comentario una oportunidad
			$sql = 'SELECT comment_ID, comment_post_ID, comment_author, comment_author_email';
		}
		$sql .= ' FROM '.$wpdb->comments." WHERE comment_approved = 1 and comment_type = '' and comment_author_email != '".$adminemail."'";
		
		if (intval($options['soco_interval']) > 0) {
			$sql .= ' AND comment_date_gmt BETWEEN CURDATE() - INTERVAL '.$options['soco_interval'].' DAY AND CURDATE() ';
		}
		
		$sql .= ' ORDER BY RAND() LIMIT 20';
		
		$results = $wpdb->get_results($sql);
		$output = "<ol>";
		$array_vistos=array();
		foreach($results as $result) {
			if (!in_array($result->comment_author_email,$array_vistos))
			{
				$array_vistos[]=$result->comment_author_email;
				if ($stipo > 0) {
					$output .= '<li><a href="mailto:'.$result->comment_author_email.'">'.$result->comment_author.'</a></li>';
				} else {
					$output .= '<li><a href="'.get_site_url().'/?p='.$result->comment_post_ID.'#comment-'.$result->comment_ID.'" target="_blank">'.$result->comment_author.' por este comentario.</a></li>';
				}
			}
		}
		$output .= "</ol>";
		return $output;
	}
	$options_panel->Title('Premia a tus comentaristas - Realiza sorteos');
	$options_panel->addParagraph('<p>No hay nada más importante en un blog que aquellas personas que deciden quedarse y aportar su propio granito de arena a tus posts. Tus comentaristas son lo más importante, tu comunidad. Esta función es ideal para <strong>premiar a tus comentaristas </strong> realizando un sorteo. </p>');
	$options_panel->addParagraph('<h3>Configuración del sistema de sorteo</h3>');
	$intervaloso = array(
	  		'0' => 'Todo el tiempo',
			'30' => 'Últimos 30 días',
			'90' => 'Últimos 90 días',
			'180' => 'Últimos 180 días',
			'365' => 'Últimos 365 días'
		);
	  $options_panel->addSelect('soco_interval',
	  						$intervaloso,
							array('name'=> 'Antigüedad de Comentarios', 
							'std'=> array('0'), 
							'desc' => 'La antiguedad máxima de los comentarios que entrarán en el sorteo. Por defecto, se sortea entre todos los comentarios. Si lo prefieres puede establecer un periodo más reciente.<strong>Importante!:</strong> Después de cambiar este ajuste y guardar los datos, vuelve a recargar la página para que el sorteo se realice con la nueva función.'
		));
		$tiposo = array(
	  		'0' => 'Por comentarios',
			'1' => 'Por comentaristas',
		);
	  $options_panel->addSelect('soco_tipo',
	  						$tiposo,
							array('name'=> 'Tipo de Sorteo', 
							'std'=> array('0'), 
							'desc' => 'Define el tipo de sorteo. Puedes elegir "Por comentarios" para hacer que cada comentario sea una oportunidad de ganar. Si eliges "Por Comentarista", cada dirección de email será un candidato único y todas las personas tendrán la misma oportunidad independientemente de las veces que hayan comentado.<strong>Importante!:</strong> Después de cambiar este ajuste y guardar los datos, vuelve a recargar la página para que el sorteo se realice con la nueva función.'
		));
	

		$options_panel->addParagraph('<h3>Resultado del sorteo</h3><p>Nada más guardar los cambios, el sistema muestra los resultados de un último sorteo con los ajustes anteriores. Si acabas de cambiar estos datos, por favor, <a href="#" onclick="javascript:location.reload();"> recarga la página </a>.'.realizaSorteo().'</p>');

  $options_panel->CloseTab();
  
  $options_panel->OpenTab('colaborar');
  
  $paypallink = '<a href="https://www.paypal.me/vicampuzano" target="_blank"> >> Donar una pequeña cantidad para colaborar << </a>';
	$options_panel->Title('Hacer un donativo');
	$options_panel->addParagraph('Quizás pienses que es una cuestión de dinero, pero no es así. Sea cual sea la cantidad, aunque sea un euro, es para mí mucho más que dinero. Es que te has tomado la molestia de hacer un donativo, de premiar mi trabajo, de enviarme la máxima muestra de satisfacción y apoyo. <b>No es por dinero, es por amor</b>. Si lo consideras oportuno, si te apetece, <b>aceptaré encantadísimo cualquier donación para contribuir en el desarrollo de este plugin</b>');
	$options_panel->addParagraph($paypallink);
	$options_panel->Title('Enviar feedback');
	$options_panel->addParagraph('<p>El dinero no lo es todo, ya lo sabes. Otra forma de ayudarme es <a href="http://www.victorcampuzano.es/contactar/" target="_blank">enviarme tus impresiones</a>, tanto si son positivas como si son negativas. Sobre todo, si pruebas el plugin y dedices desactivarlo, contarme el porqué de tu decisión me ayudaría mucho a mejorar continuamente. Cualquier cosa que creas que puede ayudarme, házmela saber. ¿Sabes? Suelo agradecer nuevas funciones a quienes me las sugieren...');
	$options_panel->Title('Compartir');
	$options_panel->addParagraph('<p>Otra forma de ayudarme es hacerlo llegar a cada vez más gente. Más gente, más descargas, mas motivación, más funciones...</p><style type="text/css">ul.share-buttons{list-style:none;padding: 0;} ul.share-buttons li{display:inline;}</style><ul class="share-buttons"> <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F&t=Vcgs%20Toolbox%20-%20El%20Plugin%20%22must%22%20para%20Wordpress" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li><li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F&text=Vcgs%20Toolbox%20-%20El%20Plugin%20%22must%22%20para%20Wordpress:%20https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F&via=vicampuzano" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x"></i></a></li><li><a href="https://plus.google.com/share?url=https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F" target="_blank" title="Share on Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F&title=Vcgs%20Toolbox%20-%20El%20Plugin%20%22must%22%20para%20Wordpress&summary=Descubre%20este%20plugin%20tan%20interesante%20desarrollado%20por%20V%C3%ADctor%20Campuzano%20con%20un%20conjunto%20de%20funciones%20dise%C3%B1adas%20para%20el%20crecimiento%20de%20tu%20blog%2C%20el%20aumento%20del%20n%C3%BAmero%20de%20comentarios%20y%20el%20beneficio%20de%20tus%20propios%20lectores.%20%C2%A1No%20te%20lo%20pierdas!&source=https%3A%2F%2Fwordpress.org%2Fplugins%2Fvcgs-toolbox%2F" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li></ul>');
  
  $options_panel->CloseTab();
  
  $options_panel->OpenTab('importexport');
  $options_panel->Title('Importar y Exportar Configuración');
  $options_panel->addParagraph('En esta pestaña puedes realizar una copia de seguridad de los ajustes de Vcgs Toolbox por si acaso los pierdes');
  $options_panel->addImportExport();
  $options_panel->CloseTab();