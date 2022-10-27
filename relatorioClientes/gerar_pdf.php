<?php

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once './conexao.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT id, name, username, password, city, gender, image FROM regclientestcc";
$query_clienteM = "select count(*) as total_clientesM from regclientestcc WHERE gender = 'male' ";
$query_clienteF = "select count(*) as total_clientesF from regclientestcc WHERE gender = 'female' ";
$query_tproduto = "select count(*) as total_produtos from regclientestcc";
$query_categoria1 = "select count(*) as total_clientes from regclientestcc WHERE city = 'Campinas'";
$query_categoria2 = "select count(*) as total_clientes from regclientestcc WHERE city = 'Hortolandia'";
$query_categoria3 = "select count(*) as total_clientes from regclientestcc WHERE city = 'Sumare'";

// Prepara a QUERY
$result_usuarios = $conn->prepare($query_usuarios);

$result_clienteM = $conn->prepare($query_clienteM);

$result_clienteF = $conn->prepare($query_clienteF);

$result_tproduto = $conn->prepare($query_tproduto);

$result_cat1 = $conn->prepare($query_categoria1);

$result_cat2 = $conn->prepare($query_categoria2);

$result_cat3 = $conn->prepare($query_categoria3);

// Executar a QUERY
$result_usuarios->execute();
$result_clienteM->execute();
$result_clienteF->execute();
$result_tproduto->execute();
$result_cat1->execute();
$result_cat2->execute();
$result_cat3->execute();

// Informacoes para o PDF


$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Relatório Produtos</title>";
$dados .= "</head>";
$dados .= "<body>";
while($row_tproduto = $result_tproduto->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_tproduto);
    $dados .= "<h1>Lista de Clientes - $total_produtos </h1>";
}

// Ler os registros retornado do BD
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_usuario);
    $dados .= "<table border='1'>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Cidade</td>
        <td>Sexo</td>
        <td>Nome de usuário</td>
        <td>Senha</td>
        <td>Foto de Perfil</td>
    </tr>
    <tr>
    <td>$id</td>
    <td>$name</td>
    <td>$city</td>
    <td>$gender</td>
    <td>$username</td>
    <td>$password</td>
    <td><img src= 'http://localhost/phpBase/relatorioClientes/$image' width='100' height='100'></td>
    </tr>
</table>";
    $dados .= "ID: $id <br>";
    $dados .= "Nome: $name <br>";
    $dados .= "Cidade: $city <br>";
    $dados .= "Sexo: $gender <br>";
    $dados .= "Nome de usuário: $username <br>";
    $dados .= "Senha: $password <br>";
    $dados .= "<img src= 'http://localhost/phpBase/relatorioClientes/$image' width='100' height='100'> <br>";
    $dados .= "<hr>";
}
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<h1>asd asd asda sdas dResumo dos Clientes Cadastrados</h1>";
$dados .= "<br>";

while($row_clienteM = $result_clienteM->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_clienteM);
    if($total_produtos > 0){
    $dados .= "<h3>Temos $total_clientesM clientes do sexo masculino cadastrado </h3>";
    }
}

while($row_clienteF = $result_clienteF->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_clienteF);
    if($total_produtos > 0){
    $dados .= "<h3>Temos $total_clientesF clientes do sexo feminino cadastrado </h3>";
}
}

while($row_cat3 = $result_cat1->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat3);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_clientes usuários que moram em Campinas </h3>";
}
}

while($row_cat4 = $result_cat2->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat4);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_clientes usuários que moram em Hortolândia </h3>";
}
}

while($row_cat5 = $result_cat3->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat5);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_clientes usuários que moram em Sumaré </h3>";
    }
}



// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
