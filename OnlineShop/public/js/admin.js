const requerimentos = document.getElementById('requerimentos')
const requerimentosDiv = document.getElementById('requerimentosDiv')

requerimentos.addEventListener('change', function() {
  if(requerimentos.checked == true) {
    requerimentosDiv.style.display = 'block'
  }else {
    requerimentosDiv.style.display = 'none'
  }
})