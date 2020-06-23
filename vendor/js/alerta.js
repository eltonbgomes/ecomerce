function alerta_cliente_excluir(){
var r=confirm("Quer realmente excluir seu cadastro?");
if (r==true){
	window.location.href = "cliente_excluir.php";
	}
}