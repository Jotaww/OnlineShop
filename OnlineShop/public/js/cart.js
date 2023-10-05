const gamesCart = document.querySelectorAll('.gamesCart')
const removeGame = document.querySelectorAll('.removeGame')

for (let index = 0; index < gamesCart.length; index++) { 

  gamesCart[index].addEventListener('mouseenter', () => {
    removeGame[index].style.display = 'block';
  });
  
  gamesCart[index].addEventListener('mouseleave', () => {
    removeGame[index].style.display = 'none';
  });

}