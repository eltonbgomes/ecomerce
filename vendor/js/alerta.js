function alerta_usuario_excluir(){
var r=confirm("Quer realmente excluir seu cadastro?");
if (r==true){
	window.location.href = "usuario_excluir.php";
	}
}