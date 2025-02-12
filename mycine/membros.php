<?php
// Definindo um array associativo com informações dos membros
$membros = [
    [
        'nome' => 'Gabriela Claro',
        'funcao' => 'Responsável por implementar a funcionalidade de contato do sistema, que permite aos usuários enviar mensagens. Isso inclui a criação do formulário e o processamento de informações enviadas.',
        'estruturas' => 'HTML, PHP, CSS'
    ],
    [
        'nome' => 'Davi Rodrigues',
        'funcao' => 'Responsável pelo sistema de login, permitindo que os usuários se autenticassem. Também desenvolveu a página que exibe os detalhes de um filme específico, incluindo informações como título, resumo, gêneros, nota e preço do ingresso. Além de ter feito a revisão de funcionalidades do site.',
        'estruturas' => 'PHP, HTML, CSS'
    ],
    [
        'nome' => 'Diego Rocha',
        'funcao' => 'Responsável pela funcionalidade de compra de ingressos no sistema, incluindo a seleção de poltronas, combos de lanches e o processamento do pagamento.',
        'estruturas' => 'HTML, CSS, PHP'
    ],
    [
        'nome' => 'Ryan Victor',
        'funcao' => 'Responsável pela implementação da página "index" que desempenha um papel fundamental na aplicação, servindo como a página principal onde os usuários podem acessar as funcionalidades do sistema de venda de ingressos e a estilização do projeto.',
        'estruturas' => 'HTML, CSS, PHP'
    ],
    [
        'nome' => 'Rayane Maria',
        'funcao' => 'Responsável pela funcionalidade da página "membros" do sistema. Essa página apresenta as informações dos membros da equipe, destacando suas funções e as tecnologias que utilizaram no desenvolvimento do projeto. E também revisando funcionalidades.',
        'estruturas' => 'HTML, CSS, PHP'
    ]
   
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine - Membros</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/membros.css">
</head>
<body>
<!-- Navbar -->
<?php include 'navbar.php'; ?>
<div class="container membros-page">
    <h1>Membros</h1>
    <h2>Conheça a Equipe</h2>

    <?php foreach ($membros as $membro): ?>
    <div class="member">
        <h3> <?php echo $membro['nome']; ?></h3>
        <p><strong>Função:</strong> <?php echo $membro['funcao']; ?></p>
        <p><strong>Estruturas utilizadas:</strong> <?php echo $membro['estruturas']; ?></p>
    </div>
    <?php endforeach; ?>

    <a href="index.php" class="button-return">Voltar para a página inicial</a>
</div>

</body>
</html>
