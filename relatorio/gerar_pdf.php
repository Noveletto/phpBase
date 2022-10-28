<?php

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once './conexao.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT id, nome, categoria, estoque, preco FROM produtos";
$query_produto = "select count(*) as total_produtos from produtos WHERE estoque > 0";
$query_tproduto = "select count(*) as total_produtos from produtos";

$query_vendas = "SELECT sum(estoque * preco) as valor_vendas from produtos";
$query_categoria1 = "SELECT sum(estoque) as total_produtos from produtos WHERE categoria = 'Livro-Escolar' and estoque > 0";
$query_categoria2 = "SELECT sum(estoque) as total_produtos from produtos WHERE categoria = 'Camisa-Masculina' and estoque > 0";
$query_categoria3 = "SELECT sum(estoque) as total_produtos from produtos WHERE categoria = 'Camisa-Feminina' and estoque > 0";
$query_categoria4 = "SELECT sum(estoque) as total_produtos from produtos WHERE categoria = 'Calça-Masculina' and estoque > 0";
$query_categoria5 = "SELECT sum(estoque) as total_produtos from produtos WHERE categoria = 'Calça-Feminina' and estoque > 0";

// Prepara a QUERY
$result_usuarios = $conn->prepare($query_usuarios);

$result_produto = $conn->prepare($query_produto);

$result_tproduto = $conn->prepare($query_tproduto);

$result_vendas = $conn->prepare($query_vendas);

$result_cat1 = $conn->prepare($query_categoria1);

$result_cat2 = $conn->prepare($query_categoria2);

$result_cat3 = $conn->prepare($query_categoria3);

$result_cat4 = $conn->prepare($query_categoria4);

$result_cat5 = $conn->prepare($query_categoria5);

// Executar a QUERY
$result_usuarios->execute();
$result_produto->execute();
$result_tproduto->execute();
$result_vendas->execute();
$result_cat1->execute();
$result_cat2->execute();
$result_cat3->execute();
$result_cat4->execute();
$result_cat5->execute();

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
    $dados .= "<h1>Lista de Produtos - $total_produtos </h1>";
}

// Ler os registros retornado do BD
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_usuario);
    $dados .= "ID: $id <br>";
    $dados .= "Produto: $nome <br>";
    $dados .= "Categoria: $categoria <br>";
    $dados .= "Estoque: $estoque <br>";
    $dados .= "Preço: R$$preco <br>";
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
$dados .= "<br>";
$dados .= "<br>";
$dados .= "<h1>Resumo dos Produtos em estoque</h1>";
$dados .= "<br>";

while($row_produto = $result_produto->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_produto);
    if($total_produtos > 0){
    $dados .= "<h3>Temos $total_produtos produtos com pelo menos 1 unidade em estoque</h3>";
    }
}

while($row_vendas = $result_vendas->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_vendas);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de R$$valor_vendas em produtos no estoque </h3>";
}
}

while($row_cat1 = $result_cat1->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat1);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_produtos da categoria Livro Escolar no estoque </h3>";
}
}

while($row_cat2 = $result_cat2->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat2);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_produtos da categoria Camisa Masculina no estoque </h3>";
}
}

while($row_cat3 = $result_cat3->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat3);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_produtos da categoria Camisa Feminina no estoque </h3>";
}
}

while($row_cat4 = $result_cat4->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat4);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_produtos da categoria Calça Masculina no estoque </h3>";
}
}

while($row_cat5 = $result_cat5->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_cat5);
    if($total_produtos > 0){
    $dados .= "<h3>Temos um total de $total_produtos da categoria Calça Feminina no estoque </h3>";
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
