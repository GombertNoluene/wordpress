<?php get_header(); ?>

<div class="container">

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    /**
     * La méthode the_post() permet de charger le post courant
     * Un post est un type de contenu, par exemple une actualité ou une page
     **/
    the_post(); 

    /**
     * La méthode the_content() affiche le contenu du post en cours
     * Il s'agit du contenu que vous avez renseigné dans le back-office
     * Il existe d'autres méthodes, par exemple pour afficher le Titre du contenu, on peut utiliser la méthode the_title()
     */
    the_content();
    $banner = get_field('banner_background_image');
    $bandeau = get_field('conference_img');
    $programme = get_field('programme_img');
    $orateur_img = get_field('orateur_repeteur_image');
    $information = get_field('information_img');
  }
}

?>


<section class="banner" style="background-image: url('<?php echo $banner['url']; ?>'); height: 50vh; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
  <p class="banner_baseline"><?php the_field('banner_baseline'); ?></p>
  <p class="banner_title_brown"><?php the_field('banner_title_brown'); ?></p>
  <p class="banner_title_green"><?php the_field('banner_title_green'); ?></p>
  <a class="banner_register_link"><?php the_field('banner_register_link'); ?></a>
</section>


<section class="conference">
  <p class="conference_title"><?php the_field('conference_title'); ?></p>
  <p class="conference_texte"><?php the_field('conference_texte'); ?></p>
  <img class="conference_img"src="<?php echo $bandeau['url']; ?>" alt="" />
</section>


<section class="programme">
  <p class="programme_title"><?php the_field('programme_title'); ?></p>

  <div class="programme_grid">
    <div class="left">
      <p class="programme_title_left"><?php the_field('programme_title_left'); ?></p>
       <div class="programme_edt_matin"> 
        <?php 
            $programs = get_field('programme_edt_matin'); 
            foreach ($programs as $program){
              echo "<p class='programme_hour'>".$program['programme_hour']."</p>";
              echo "<p class='programme_description'>".$program['programme_description']."</p></br>";
            }
          ?>
        </div>
    </div>

    <div class="right">
      <p class="programme_title_right"><?php the_field('programme_title_right'); ?></p>
       <div class="programme_edt_matin_2"> 
        <?php 
            $programs = get_field('programme_edt_matin_2'); 
            foreach ($programs as $program){
              echo "<p class='programme_hour'>".$program['programme_hour']."</p>";
              echo "<p class='programme_description'>".$program['programme_description']."</p></br>";
            }
          ?>
        </div>
    </div>
  </div>
  <a class="programme_register_link"><?php the_field('programme_register_link'); ?></a>
  <img class="programme_img"src="<?php echo $programme['url']; ?>" alt="" />
</section>


<section class="orateur">
  <p class="orateur_title"><?php the_field('orateur_title'); ?></p>
  <p class="orateur_texte"><?php the_field('orateur_texte'); ?></p>

  <div class="orateur_flex">
    <?php 
        $orateurs = get_field('orateur_contact'); 
        foreach ($orateurs as $orateur){
          //var_dump($orateur);
          //$orateur['orateur_repeteur_image']['url'];
          echo "<div class='orateur_personne'>";
          echo "<img class='orateur_repeteur_image' src=".$orateur['orateur_repeteur_image']['url']." />";
          echo "<p class='orateur_repeteur_nom'>".$orateur['orateur_repeteur_nom']."</p>";
          echo "<p class='orateur_repeteur_description'>".$orateur['orateur_repeteur_description']."</p>";
          echo "<div class='orateur_repeteur_video'><a>".$orateur['orateur_repeteur_video']['title']."</a></div>";
          echo "</div>";
        }
      ?>
  </div>


</section>


<p class="information_title"><?php the_field('information_title'); ?></p>

<section class="information" style="background-image: url('<?php echo $information['url']; ?>'); height: 100vh; background-repeat: no-repeat; background-size: cover; margin: 5% 5%;">
  <div class="information_vert">
    <div class="information_vert_adresse">
      <img class="picto" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-map.svg" alt="">
      <p class="information_adress"><?php the_field('information_adress'); ?></p>
    </div>
    <div class="information_vert_horaire">
      <img class="picto" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-time.svg" alt="">
      <p class="information_horaire"><?php the_field('information_horaire'); ?></p>
    </div>
    <div class="information_vert_restaurant">
      <img class="picto" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-dinner.svg" alt="">
      <p class="information_restaurant"><?php the_field('information_restaurant'); ?></p>
    </div>
  </div>
  <p class="information_carte"><?php the_field('information_carte'); ?></p>



</section>

<?php get_footer(); ?>