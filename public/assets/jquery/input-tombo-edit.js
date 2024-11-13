const tombo = document.getElementById('quantidade');
    const inputsContainer2 = document.getElementById('inputsContainer2');
    const obraQuantidade = parseInt(tombo.value); // Obtém o valor do input como número

    tombo.addEventListener('input', () => {
        const value = parseInt(tombo.value);
        inputsContainer2.innerHTML = ''; // Limpa inputs anteriores

        // Usa o valor de obraQuantidade em vez de PHP
        if (value > obraQuantidade && value < 100) {
            for (let i = 0; i < value - obraQuantidade; i++) {
                // Cria um novo input
                const input = document.createElement('input');
                input.placeholder = `Tombo ${i + 1}`; // Placeholder para o input
                input.type = 'text';
                input.name = `tombo[]`; // Nome do tombo
                input.id = `tombo`; // Cuidado: isso pode causar IDs duplicados
                input.autocomplete = 'off';
                input.className = 'form-control form-group'; // Adiciona as classes form-control e form-group

                // Adiciona o evento de input para verificar duplicatas
                input.addEventListener('input', () => verificarDuplicatas());

                inputsContainer2.appendChild(input);
            }
        } else if (value > 100) {
            alertDiv.textContent = 'Número de tombos muito alto.';
            alertDiv.style.display = 'block'; // Mostra o aviso
        }
    });

    function verificarDuplicatas() {
        const inputs = document.querySelectorAll('input[id="tombo"]'); // Usa a tag de input com o id "tombo"
        const valores = {};
        const button = document.getElementById('salvar_obra');
        let temDuplicata = false;

        // Limpa mensagens anteriores
        inputs.forEach(input => {
            const mensagemAlerta = input.nextElementSibling;
            if (mensagemAlerta && mensagemAlerta.classList.contains('alerta-duplicata')) {
                mensagemAlerta.remove();
            }
        });

        // Loop para contar valores
        inputs.forEach(input => {
            if (input.value) {
                if (valores[input.value]) {
                    valores[input.value]++;
                    temDuplicata = true;
                } else {
                    valores[input.value] = 1;
                }
            }
        });

        // Loop para aplicar estilos e mensagens nos inputs duplicados
        inputs.forEach(input => {
            if (valores[input.value] > 1) {
                input.style.border = '2px solid red';
                input.style.color = 'red';
                button.disabled = true;

                // Cria uma mensagem de alerta
                const alerta = document.createElement('div');
                alerta.className = 'alerta-duplicata'; // Classe para estilizar
                alerta.textContent = 'Valor duplicado!';
                alerta.style.color = 'red';
                alerta.style.fontSize = '0.8em';
                alerta.style.marginTop = '5px';
                alerta.style.marginBottom = '5px';

                // Insere a mensagem abaixo do input
                input.parentNode.insertBefore(alerta, input.nextSibling);
            } else {
                input.style.border = '';
                input.style.color = '';
            }
        });
    }