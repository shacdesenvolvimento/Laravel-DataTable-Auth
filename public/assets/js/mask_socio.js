    // Função para aplicar a máscara ao campo de entrada de telefone
    function aplicarMascaraTelefone() {
        var telefoneInput = document.getElementById('telefone');
        var valor = telefoneInput.value.replace(/\D/g, '');
        var novoValor = '';
      
        if (valor.length > 0) {
          novoValor += '(' + valor.substring(0, 2) + ')';
          if (valor.length > 2) {
            if (valor.length >= 7 && valor.length <= 10) {
              novoValor += ' ' + valor.substring(2, 6) + '-' + valor.substring(6);
            } else {
              novoValor += ' ' + valor.substring(2, 6);
              if (valor.length >= 6) novoValor += '-';
              novoValor += valor.substring(6);
            }
          }
        }
      
        telefoneInput.value = novoValor;
      }
    
      
  // Função para aplicar a máscara ao campo de entrada de CNPJ
  function aplicarMascaraCNPJ() {
    var cnpjInput = document.getElementById('cnpj');
    var valor = cnpjInput.value.replace(/\D/g, '');
    var novoValor = '';

    if (valor.length > 0) {
      novoValor += valor.substring(0, 2) + '.';
      if (valor.length > 2) {
        novoValor += valor.substring(2, 5) + '.';
        if (valor.length > 5) {
          novoValor += valor.substring(5, 8) + '/';
          if (valor.length > 8) {
            novoValor += valor.substring(8, 12) + '-';
            novoValor += valor.substring(12, 14);
          } else {
            novoValor += valor.substring(8);
          }
        } else {
          novoValor += valor.substring(5);
        }
      } else {
        novoValor += valor.substring(2);
      }
    }

    cnpjInput.value = novoValor;
  }

  // Chame a função de aplicar a máscara enquanto digita no campo de entrada
    document.getElementById('cnpj').addEventListener('input', aplicarMascaraCNPJ);
      // Chame a função de aplicar a máscara enquanto digita no campo de entrada
    document.getElementById('telefone').addEventListener('input', aplicarMascaraTelefone);
    

