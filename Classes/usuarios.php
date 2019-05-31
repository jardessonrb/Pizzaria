<?php 
class usuarios{
	public function logar($dados){
	   
       $con = new conectar();

       $conexao = $con->conexao();
	   

	   $sql = "SELECT * FROM tab_usuarios WHERE usuario = '$dados[0]' AND senha = '$dados[1]'";

	   $result = mysqli_query($conexao, $sql);
       //echo $sql;

	   if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}

    }
}

?>