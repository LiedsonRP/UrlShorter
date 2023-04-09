function copyToClipboard() {
    const textToCopy = document.querySelector('#copy-area p').textContent;
  
    navigator.clipboard.writeText(textToCopy).then(() => {
      alert('Texto copiado para a área de transferência!');
    }).catch(err => {
      console.error('Erro ao copiar texto: ', err);
    });
  }
  
const copyArea = document.querySelector('#copy-area');
copyArea.addEventListener('click', copyToClipboard);