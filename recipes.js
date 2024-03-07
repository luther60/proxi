const recipes = await fetch("/../lib/recipes.json", {
  method: 'GET',
  headers: {
    "Content-type": "application/json;charset=UTF-8",
    "accept": "application/json"
  }
}).then(recipe => recipe.json());

const section = document.querySelector('.card_recipe')

function getFilter(recipes) { 

for(let i = 0; i < recipes.length; i++ ) {
 
  const article = document.createElement('article')
  article.classList.add('content_recipe')
  //Création image
  const img = document.createElement('img')
  img.classList.add('img_recipe')
  img.src = 'admin/recipes/'+recipes[i].img
  //Céation du titre
  const name = document.createElement('h1')
  name.classList.add('text_name')
  name.innerText = recipes[i].name
  //Création temps, cuisson, catégorie
  const h_time = document.createElement('h2')
  h_time.classList.add('text_recipe')
  h_time.innerText = 'Temps de préparation'
  const time = document.createElement('h3')
  time.classList.add('text_recipe')
  time.innerText = recipes[i].time+' min'

  const h_cook = document.createElement('h2')
  h_cook.classList.add('text_recipe')
  h_cook.innerText = 'Temps de cuisson'
  const cook = document.createElement('h3')
  cook.classList.add('text_recipe')
  cook.innerText = recipes[i].cook+' min'

  const h_category = document.createElement('h2')
  h_category.classList.add('text_recipe')
  h_category.innerText = 'Type de plats'
  const category = document.createElement('h3')
  category.classList.add('text_recipe')
  category.innerText = recipes[i].category
  const detail = document.createElement('a')
  detail.classList.add('detail')
  detail.innerText = 'Détails de la recette'
  detail.href = 'recette.php?id='+recipes[i].id
 
  section.appendChild(article)
  article.appendChild(img)
  article.appendChild(name)
  article.appendChild(h_time)
  article.appendChild(h_cook)
  article.appendChild(h_category)
  h_time.appendChild(time)
  h_cook.appendChild(cook)
  h_category.appendChild(category)
  article.appendChild(detail)
}
}

getFilter(recipes)

const filter = document.querySelector('#filter_recipe')
//Ecoute de l'event au changement
filter.addEventListener('change', function() {
  if(filter.value == 'time') {//Si choix de temps de cuisson(value = time)
    const filterTime = recipes.sort(function(a,b) {
    return a.time - b.time  
  })
   document.querySelector('.card_recipe').innerHTML = "";
   getFilter(filterTime) 
  }

  if(filter.value == 'cook') {//Si choix de temps de préparation(value = cook)
    const filterCook = recipes.sort(function(a,b) {
    return a.cook - b.cook  
  })
   document.querySelector('.card_recipe').innerHTML = "";
   getFilter(filterCook) 
  }

if(filter.value == 'Plat') {//Si choix par type 'Plat'(value = Plat) 
   document.querySelector('.card_recipe').innerHTML = "";//On vide la page
  for(let i = 0; i < recipes.length; i++) {//On boucle sur les index
  let value = recipes[i].category//On stocke ds une variable
  
  if(value == 'Plat') {//On compare
    const newArray = []//On instancie un array vide
    newArray.push(recipes[i])//On push les bonnes valeurs ds le tableau
    getFilter(newArray)//On affiche
  }
 } 
}

if(filter.value == 'Entrée') {//Si choix par type 'Entrée'(value = Entrée)  
document.querySelector('.card_recipe').innerHTML = "";
  for(let i = 0; i < recipes.length; i++) {
  let value = recipes[i].category

  if(value == 'Entrée') {
    const newArray = []
    newArray.push(recipes[i])
    getFilter(newArray)
  } 
 } 
}

if(filter.value == 'Dessert') {//Si choix par type 'Dessert'(value = Dessert)  
   document.querySelector('.card_recipe').innerHTML = "";
  for(let i = 0; i < recipes.length; i++) {
  let value = recipes[i].category

  if(value == 'Dessert') {
    const newArray = []
    newArray.push(recipes[i])
    console.log(newArray)
    getFilter(newArray)
  }
 } 
}

if(filter.value == 'allRecipes') {
  getFilter(recipes)
}

})
 

 








  


