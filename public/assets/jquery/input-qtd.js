const tombo = document.getElementById('quantidade');
const inputsContainer = document.getElementById('inputsContainer');
const alertDiv = document.getElementById('alert');

tombo.addEventListener('input', () => {
    const value = parseInt(tombo.value);
    inputsContainer.innerHTML = ''; // Limpa inputs anteriores
    alertDiv.style.display = 'none'; // Esconde o aviso
    
    if (value > 0 && value <= 100) {
        for (let i = 0; i < value; i++) {
            // Cria um novo label
            const label = document.createElement('label');
            label.textContent = `Tombo ${i + 1}:`;
            label.setAttribute('for', `input-${i + 1}`);
            label.className = 'form-label'; // Adiciona a classe form-label
            inputsContainer.appendChild(label);

            // Cria um novo input
            const input = document.createElement('input');
            input.type = 'text';
            input.id = `input-${i + 1}`;
            input.className = 'form-control form-group'; // Adiciona as classes form-control e form-group

            inputsContainer.appendChild(input);
        }
    }else if (value > 100) {
        alertDiv.textContent = 'Número de tombos muito alto.';
        alertDiv.style.display = 'block'; // Mostra o aviso
    }
});