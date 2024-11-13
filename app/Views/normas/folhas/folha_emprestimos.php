<html>
    <head>
        <title>
            Relatório de emprestimos
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
                font-size: 15px;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>Relatório de Empréstimos</h1>
        <table>
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Telefone</th>
                    <th>Turma</th>
                    <th>CPF</th>
                    <th>Obra</th>
                    <th>Data de Início</th>
                    <th>Data de Prazo</th>
                    <th>Data de Devolução</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emprestimo as $emprestimo): ?> 
                <tr>
                    <td><?=htmlspecialchars($emprestimo['nome'])?></td>
                    <td><?=htmlspecialchars($emprestimo['telefone'])?></td>
                    <td><?=htmlspecialchars($emprestimo['turma'])?></td>
                    <td><?=htmlspecialchars($emprestimo['cpf'])?></td>
                    <td><?=htmlspecialchars($emprestimo['titulo'])?></td>
                    <td><?=htmlspecialchars($emprestimo['data_inicio_formatada'])?></td>
                    <td><?=htmlspecialchars($emprestimo['data_prazo_formatada'])?></td>
                    <td><?=htmlspecialchars($emprestimo['data_fim_formatada'])?></td>
                </tr>;

            <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>