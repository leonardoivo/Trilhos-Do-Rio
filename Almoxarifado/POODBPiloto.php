<?php
$conexao = new PDO('mysql:host=localhost;dbname=TrilhosDoRio', 'root', '784512');
$dados = $conexao->query('select * from livros');

while($linha=$dados->fetch(PDO::FETCH_OBJ)){
    echo $linha->nome_do_livro . ' - ' . $linha->Editora;
    echo '<br>';


}
?>