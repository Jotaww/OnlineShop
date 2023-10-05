var changePass = document.getElementById('changePass')
var infosAccount = document.getElementById('infosAccount')
var changePassBtn = document.getElementById('changePassBtn')
var minhaConta = document.getElementById('minhaConta')

changePassBtn.addEventListener('click', function(e) {
  infosAccount.style.display = 'none'
  changePass.style.display = 'block'
  minhaConta.style.background = 'none'
  changePassBtn.style.background = '#09c'
})

minhaConta.addEventListener('click', function(e) {
  infosAccount.style.display = 'block'
  changePass.style.display = 'none'
  minhaConta.style.background = '#09c'
  changePassBtn.style.background = 'none'
})

function enviarFormulario() {
  document.getElementById("myForm").submit();
}