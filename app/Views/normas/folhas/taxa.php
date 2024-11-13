<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxas do Sistema - Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1 {
            text-align: center;
            color: #004d99;
        }
        .section-title {
            background-color: #f0f0f0;
            padding: 10px;
            font-weight: bold;
            margin-top: 20px;
            color: #003366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f7f7f7;
        }
        .text-success {
            color: green;
        }
        .text-warning {
            color: orange;
        }
        .text-danger {
            color: red;
        }
        .text-info {
            color: #007bff;
        }
    </style>
</head>
<body>

<h1>Taxas de Serviço - Biblioteca</h1>

<p>Confira abaixo as taxas aplicadas pela nossa biblioteca. Essas taxas são válidas para os serviços e empréstimos realizados.</p>

<div class="section-title">1. Taxas de Empréstimo</div>
<p><strong>Taxa de Atraso:</strong> <span class="text-danger">R$ 2,00 por dia de atraso</span></p>
<p><strong>Taxa de Renovação de Empréstimo:</strong> <span class="text-warning">R$ 5,00 por renovação</span></p>

<div class="section-title">2. Taxas de Inscrição</div>
<p><strong>Inscrição para Novos Usuários:</strong> <span class="text-info">R$ 15,00 (cobrado uma única vez)</span></p>

<div class="section-title">3. Taxas de Impressão e Cópias</div>
<table>
    <thead>
        <tr>
            <th>Serviço</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Impressão (preto e branco)</td>
            <td><span class="text-success">R$ 0,50 por página</span></td>
        </tr>
        <tr>
            <td>Impressão (colorido)</td>
            <td><span class="text-success">R$ 1,50 por página</span></td>
        </tr>
        <tr>
            <td>Cópia (preto e branco)</td>
            <td><span class="text-success">R$ 0,30 por cópia</span></td>
        </tr>
        <tr>
            <td>Cópia (colorido)</td>
            <td><span class="text-success">R$ 1,00 por cópia</span></td>
        </tr>
    </tbody>
</table>

<div class="section-title">4. Outras Taxas</div>
<p><strong>Taxa de Reserva de Livro:</strong> <span class="text-warning">R$ 3,00 por reserva</span></p>
<p><strong>Taxa de Substituição de Livro Perdido:</strong> <span class="text-danger">Valor do livro + 20% de taxa administrativa</span></p>

</body>
</html>