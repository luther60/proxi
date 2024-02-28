/*Récupération de nos éléments*/
const navbar = document.getElementById('navbar');
const logo = document.getElementById('img_logo');
const input_nav = document.querySelectorAll('.input_nav');
const link = document.querySelectorAll('a')
/*Mise en place de l'écouteur d'évènement */
navbar.addEventListener('click', function() {
  navbar.classList = this.style.display = 'none';
  logo.style.display = 'none';
/*Boucle sur l'élément et mise en place du style souhaité*/  
  input_nav.forEach((input) => 
  input.classList = this.style.display += 'flex');
  
  input_nav.forEach((input) => 
  input.style.background = '#b37799')
  console.log(input_nav);

  input_nav.forEach((input) => 
  input.style.margin = '10px')
  console.log(input_nav);
 
  input_nav.forEach((input) => 
  input.style.fontSize = '1.5em')
  console.log(input_nav);

  input_nav.forEach((input) => 
  input.style.borderRadius = '5px')
  console.log(input_nav);

  link.forEach((link) => 
  link.style.textDecoration = 'none')
  console.log(input_nav);
 
})

