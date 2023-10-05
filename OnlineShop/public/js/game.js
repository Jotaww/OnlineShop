document.querySelectorAll('.sobreJogo').forEach(function (el) {
   
  var fullText = el.querySelector('.full-text');
  var shortText =  el.querySelector('.short-text');

  if(shortText.innerText.length <= 380) {
   lerMais.style.display = 'none';
  }
  
  if (! shortText) return;
  
  el.querySelector('.read-more').addEventListener('click', function () {
     fullText.style.display = '';
     shortText.style.display = 'none';
  })
  
  el.querySelector('.read-less').addEventListener('click', function () {
     fullText.style.display = 'none';
     shortText.style.display = '';
  })
})