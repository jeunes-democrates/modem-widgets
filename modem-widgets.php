<?php
/*
Plugin Name: MoDem Widgets
Plugin URI: http://www.stephanemanet.com/modem-widgets
Description: Ajoute des widgets d&eacute;di&eacute;s au Mouvement D&eacute;mocrate.
Version: 0.1
Author: St&eacute;phane Manet
Author URI: http://www.stephanemanet.com/modem
License: GPL v2+
*/

class modem_noussoutenir extends WP_Widget {

    function  __construct() {
    parent::__construct(
        // ID du widget (on peut mettre "false")
    false,
        //  Nom du widget dans le backoffice
    '[MoDem] Nous soutenir',
        //  Description dans le backoffice
        array('description'=>'Affiche un lien vers la boutique des D&eacute;mocrates'));
    }

	// Création du formulaire
	function form($instance) {

	// En l'occurence il se limite au nom apparent du widget
	if( $instance) {
		 $title = esc_attr($instance['title']);
	} else {
		 $title = 'Nous soutenir';
	}
	?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nom &agrave; afficher', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<?php
	}
	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Pour les champs
		$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
	}

	// On affiche le widget
	function widget($args, $instance) {
	   extract( $args );
	   // On récupère les options d'abord
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   // Et on affiche le tout
	   echo '<div class="widget-modem widget-soutenir">';
	   if ( $title ) {
		  echo $before_title . $title . $after_title;
	   }
	   echo '<a href="http://boutique.mouvementdemocrate.fr/" target="_blank" title="la boutique"><img class="aligncenter" src="'. plugin_dir_url() .'modem-widgets/img/4.png" alt="la boutique" title="la boutique" /></a>';
	   echo '</div>';
	   echo $after_widget;
	}
} // fin du widget nous soutenir

class modem_adherer extends WP_Widget {

    function __construct() {
    parent::__construct(
        // ID du widget (on peut mettre "false")
    false,
        //  Nom du widget dans le backoffice
    '[MoDem] Adh&eacute;rer',
        //  Description dans le backoffice
        array('description'=>'Affiche un lien vers le formulaire d&#146;adh&eacute;sion'));
    }

	// Création du formulaire
	function form($instance) {

	// Ici, on récupère les éléments du formulaire
	if( $instance) {
		 $title = esc_attr($instance['title']);
		 $text = esc_attr($instance['text']);
	} else {
		 $title = 'Adh&eacute;rer';
	}
	?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nom &agrave; afficher', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p> 
	<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Lien vers votre page adh&eacute;sion', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
	</p>
	<p class="description"><b>Remarque:</b> Indiquez ici la page de votre site internet o&ugrave; vous expliquez la proc&eacute;dure d&#146;adh&eacute;sion. Si elle nexiste pas encore, <a href="/post-new.php?post_type=page">pensez &agrave; la cr&eacute;er</a>. Si vous laissez ce champs vide, le bouton pointera de toute mani&egrave;re vers le formulaire en ligne. <a href="http://jdem92.fr/adherer-au-mouvement-democrate/">Vous trouverez ici un exemple de page expliquant la proc&eacute;dure d&#146;adh&eacute;sion.</a></p>

	<?php
	}
	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Pour les champs
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
	return $instance;
	}

	// On affiche le widget
	function widget($args, $instance) {
		extract( $args );
		// On récupère les options d'abord
		$title = apply_filters('widget_title', $instance['title']);
		$text = $instance['text'];
		echo $before_widget;
		// Affichage du widget
		echo '<div class="widget-modem widget-adherer">';
		if ( $title ) {
			echo $before_title . $title . $after_title;
	   }
		echo '<a href="';
	   // On vérifie si le champs de texte n'est pas laissé vide
		if( $text ) {
		  echo '. $text .';
	   }
		else {
		  echo 'https://guepar.mouvementdemocrate.fr/adhesion/';
		}
		echo '" target="_blank" title="adh&eacute;rer"><img class="aligncenter" src="'. plugin_dir_url() .'modem-widgets/img/3.png" alt="vers le formulaire d&#146;adh&eacute;sion" title="adh&eacute;rer" /></a>';
		echo '</div>';
		echo $after_widget;
	}
} // fin du widget adhésion

class modem_decouv_jdem extends WP_Widget {

    function  __construct() {
    parent::__construct(false,'[MoDem] D&eacute;couvrir (version JDem)',array('description'=>'Affiche un lien vers le livret d&#146;accueil des Jeunes D&eacute;mocrates'));
    }

	function form($instance) {
	if( $instance) {
		 $title = esc_attr($instance['title']);
	} else {
		 $title = '';
	}
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nom &agrave; afficher', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
	}

	function widget($args, $instance) {
	   extract( $args );
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   echo '<div class="widget-modem widget-accueil-jeunes">';
	   if ( $title ) { echo $before_title . $title . $after_title; }
	   echo '<a href="http://www.jeunes-democrates.org/files/notre_manifeste/Manifeste/Manifeste_des_Jeunes_Democrates.pdf" target="_blank" title="Manifeste optimiste pour les jeunes de France"><img class="aligncenter" src="'. plugin_dir_url() .'modem-widgets/img/2.png" alt="T&eacute;l&eacute;charger pdf" title="Manifeste optimiste pour les jeunes de France" /></a>';
	   echo '</div>';
	   echo $after_widget;
	}

} // fin du livret d'accueil JDem

class modem_decouv extends WP_Widget {

    function  __construct() {
    parent::__construct(
    false,
    '[MoDem] D&eacute;couvrir',
        array('description'=>'Affiche un lien vers le livret d&#146;accueil du Mouvement D&eacute;mocrates'));
    }

	function form($instance) {

	if( $instance) {
		 $title = esc_attr($instance['title']);
	} else {
		 $title = '';
	}
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nom &agrave; afficher', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
	}

	function widget($args, $instance) {
	   extract( $args );
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   echo '<div class="widget-modem widget-accueil">';
	   if ( $title ) { echo $before_title . $title . $after_title; }
	   echo '<a href="http://issuu.com/mouvementdemocrate/docs/la_2014_web_single/1?e=13707697/9466779" target="_blank" title="Livret d&#146;accueil du Mouvement D&eacute;mocrate"><img class="aligncenter" src="'. plugin_dir_url() .'modem-widgets/img/1.png" alt="Acc&eacute;der au livret d&#146;accueil" title="Livret d&#146;accueil du Mouvement D&eacute;mocrate" /></a>';
	   echo '</div>';
	   echo $after_widget;
	}

} // fin du livret d'accueil MoDem

// Allez, on s'enregistre tout ça

add_action('widgets_init', create_function('', 'return register_widget("modem_noussoutenir");'));
add_action('widgets_init', create_function('', 'return register_widget("modem_adherer");'));
add_action('widgets_init', create_function('', 'return register_widget("modem_decouv_jdem");'));
add_action('widgets_init', create_function('', 'return register_widget("modem_decouv");'));


?>
