<html>
        <head>
            <title>
                Relatório de obras
            </title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }
                th {
                    background-color: #f2f2f2;
                }
                .status-em-andamento {
                    background-color: #4CAF50; /* Verde */
                    color: white;
                }
                .status-concluido {
                    background-color: #FF6347; /* Vermelho */
                    color: white;
                }
                .status-pendente {
                    background-color: #FFDD00; /* Amarelo */
                    color: black;
                }
            </style>
        </head>
        <body>
            <h1>Relatório de Obras</h1>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>ISBN</th>
                        <th>Categoria</th>
                        <th>Data Ano de publicação</th>
                        <th>Data Quantidade</th>
                        <th>Data Editora</th>
                    </tr>
                </thead>
                <tbody>
    <?php foreach ($obras as $obra): ?> 
                    <tr>
                        <td><?=htmlspecialchars($obra['titulo'])?></td>
                        <td><?=htmlspecialchars($obra['isbn'])?></td>
                        <td><?=htmlspecialchars($obra['categoria'])?></td>
                        <td><?=htmlspecialchars($obra['ano_publicacao'])?></td>
                        <td><?=htmlspecialchars($obra['quantidade'])?></td>
                        <td><?=htmlspecialchars($obra['nome'])?></td>
                    </tr>;

    <?php endforeach ?>
                </tbody>
            </table>
        </body>
    </html>