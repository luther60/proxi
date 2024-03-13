<?php 
require_once 'lib/pdo.php';
require_once 'lib/users.php';
require_once 'lib/recipes_config.php';
require_once 'template/header.php';

$recipes = getRecipes($pdo);
//Récupération et affichage aléatoire d'une recette
$one = array_rand($recipes);
$two = array_rand($recipes);
$three = array_rand($recipes);
$four = array_rand($recipes);

?>

  <main>
    <div><i class="fa fa-star gold"></i></div>
    <h1 class="title">Nos recettes du moment !!</h1>
    <section class="card_recipe">

      <article class="content_recipe">
        <img class="img_recipe" src="admin/recipes/<?=$recipes[$one]['img']?>">
        <h1 class="text_name"><?=$recipes[$one]['name']?></h1>
        <h2 class="text_recipe">Temps de préparation<br><?=$recipes[$one]['time']?></h2>
        <h2 class="text_recipe">Temps de cuisson<br><?=$recipes[$one]['cook']?> min</h2>
        <h2 class="text_recipe">Type de plats<br><?=$recipes[$one]['category']?></h2>
        <a class="detail" href="recette.php?id=<?=$recipes[$one]['id']?>">Détails de la recette</a>
      </article>

      <article class="content_recipe">
        <img class="img_recipe" src="admin/recipes/<?=$recipes[$two]['img']?>">
        <h1 class="text_name"><?=$recipes[$two]['name']?></h1>
        <h2 class="text_recipe">Temps de préparation<br><?=$recipes[$two]['time']?></h2>
        <h2 class="text_recipe">Temps de cuisson<br><?=$recipes[$two]['cook']?></h2>
        <h2 class="text_recipe">Type de plats<br><?=$recipes[$two]['category']?></h2>
        <a class="detail" href="recette.php?id=<?=$recipes[$two]['id']?>">Détails de la recette</a>
      </article>

      <article class="content_recipe">
        <img class="img_recipe" src="admin/recipes/<?=$recipes[$three]['img']?>">
        <h1 class="text_name"><?=$recipes[$three]['name']?></h1>
        <h2 class="text_recipe">Temps de préparation<br><?=$recipes[$three]['time']?></h2>
        <h2 class="text_recipe">Temps de cuisson<br><?=$recipes[$three]['cook']?></h2>
        <h2 class="text_recipe">Type de plats<br><?=$recipes[$three]['category']?></h2>
        <a class="detail" href="recette.php?id=<?=$recipes[$three]['id']?>">Détails de la recette</a>
      </article>
  
      <article class="content_recipe">
        <img class="img_recipe" src="admin/recipes/<?=$recipes[$four]['img']?>">
        <h1 class="text_name"><?=$recipes[$four]['name']?></h1>
        <h2 class="text_recipe">Temps de préparation<br><?=$recipes[$four]['time']?></h2>
        <h2 class="text_recipe">Temps de cuisson<br><?=$recipes[$four]['cook']?></h2>
        <h2 class="text_recipe">Type de plats<br><?=$recipes[$four]['category']?></h2>
        <a class="detail" href="recette.php?id=<?=$recipes[$four]['id']?>">Détails de la recette</a>
      </article>
    </section>

    <article>
      <section>
        <img class="img_index" src="assets/legumesmini.jpg" alt="Image fruits et légumes frais" decoding="auto">
        
        <div class="container">
        <h3>Un havre de fraîcheur au cœur de la campagne</h3>
        <p>Poussez les portes de notre supérette et découvrez un rayon fruits et légumes frais qui saura vous séduire par sa diversité
           et sa qualité. Soucieux de répondre aux attentes de notre clientèle, nous avons sélectionné pour vous les meilleurs produits.
        <h3>Des produits de saison, gorgés de soleil</h3>
        <p>Au fil des saisons, notre rayon se pare de couleurs vives et de parfums envoûtants. Laissez-vous tenter par les tomates
           charnues et parfumées, les fraises sucrées et juteuses, les pommes croquantes et acidulées, ou encore les asperges tendres
           et savoureuses.</p>
        <h3>Un approvisionnement rigoureux et responsable</h3>
        <p>Nous privilégions les circuits courts dès que possible et collaborons étroitement avec des agriculteurs de la région qui partagent nos 
          valeurs d'agriculture raisonnée et respectueuse de l'environnement. Vous êtes ainsi assurés de trouver des produits frais 
          et sains, à l'empreinte carbone réduite.</p> 
        </div>
      </section>
      
      <section>
        <div class="container">
        <h3>Un large choix pour tous les goûts</h3>
        <p>Que vous soyez amateur de cuisine traditionnelle ou adepte de recettes exotiques, notre rayon saura combler vos envies.
           Fruits rouges, légumes anciens, herbes aromatiques... Notre assortiment répond à toutes vos exigences
           culinaires.</p>
        <h3>Un service attentionné et personnalisé</h3>
        <p>Notre équipe est à votre disposition pour vous conseiller et vous aider à choisir les produits qui 
          correspondent à vos besoins. N'hésitez pas à nous solliciter pour obtenir des conseils de préparation ou de conservation.</p>
        <h3>Le plaisir des yeux et des papilles</h3>
        <p>Soucieux de l'esthétique de notre rayon, nous mettons en scène nos produits avec soin afin de créer une ambiance chaleureuse
           et conviviale. Laissez-vous guider par vos sens et découvrez le plaisir de déguster des fruits et légumes frais, 
           savoureux et authentiques.</p>
        <h3>Le rayon fruits et légumes de notre supérette, c'est bien plus qu'un simple lieu d'achat. C'est un véritable espace de
           découverte et de plaisir gustatif, où chaque visite est une nouvelle invitation au voyage.</h3>   
          </div>
        <img class="img_index" src="assets/fondecranmini3.jpg" alt="Image fruits et légumes frais" decoding="auto">  
      </section>    
      
      <section>
        <img class="img_index" src="assets/bouteillevinmini.jpg" alt="Image bouteilles de vins millésimés">
        <div class="container">
        <h3>Un voyage œnologique au cœur de la campagne</h3>
        <p>Au-delà d'une simple supérette, notre établissement vous propose une véritable cave à ciel ouvert, nichée au cœur de la 
          campagne. Laissez-vous transporter par un voyage olfactif et gustatif à travers une sélection de vins raffinés, élaborés avec
           passion par des vignerons talentueux.</p>
        <h3>Une sélection rigoureuse pour tous les goûts</h3>
        <p>Que vous soyez novice ou amateur éclairé, notre rayon saura combler vos attentes. Notre équipe a sélectionné pour vous une 
          large gamme de vins, rouges, blancs, rosés et effervescents, issus des meilleurs terroirs de France et du monde.</p>
        <h3>Des vins d'exception à prix abordables</h3>
        <p>Nous sommes convaincus que le plaisir du vin ne doit pas nécessairement être onéreux. C'est pourquoi nous vous proposons une
           sélection de vins d'exception à des prix abordables, pour vous permettre de découvrir de nouvelles saveurs sans vous ruiner.</p>
        <h3>L'univers des vins n'aura plus de secrets pour vous grâce à notre rayon spécialisé. Laissez-vous tenter par une expérience
            œnologique unique et explorez la richesse des arômes et des saveurs.</h3>
        </div>
      </section>
      
      <section>
        <img class="img_index" src="assets/chocopacquesmini2.jpg" alt="Image chocolats de Pacques">
        <div class="container">
        <h2>La supérette : un acteur incontournable des fêtes en France</h2>
        <h3>Des produits pour tous les goûts</h3>
        <p>Que vous soyez à la recherche d'une bûche de Noël traditionnelle, d'un champagne millésimé ou de décorations originales, 
          vous trouverez forcément tout ce dont vous avez besoin dans notre supérette. Nous proposons un large choix de produits pour 
          tous les goûts et tous les budgets.</p>
        <h3>Des promotions et des offres spéciales</h3>
        <p>Tout au long de l'année, nous proposons des promotions et des offres spéciales sur les produits festifs. N'hésitez pas à
           consulter notre Facebook ou à nous rendre visite en magasin pour découvrir nos offres en cours.</p>
        <h3>Un service de proximité</h3>
        <p>Notre supérette est située à proximité de chez vous, ce qui vous permet de faire vos courses rapidement et facilement. Nous 
          sommes également ouverts le dimanche matin, pour vous permettre de vous dépanner en dernière minute.</p>
        <h3>N'attendez plus, venez dès aujourd'hui dans notre supérette pour préparer vos prochaines fêtes !</h3>
        </div>
      </section>

    </article>

  </main>

<?php require_once 'template/footer.php'; ?>