// Simulando um carregamento
window.onload = function() {
    // Exibir o aviso de carregamento
    const spinner = document.getElementById('spinner');
    const loading = document.getElementById('loading');
    // Simula um carregamento de 3 segundos
        spinner.classList.add('hidden'); // Esconde o aviso
        loading.style.display = 'block'; // Exibe o conteúdo
};