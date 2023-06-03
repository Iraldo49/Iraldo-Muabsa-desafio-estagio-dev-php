function atualizarSubtotal() {
    var quantidade = parseInt(document.getElementById('quantidade').value);
    var precoUnitario = parseFloat(document.getElementById('prico').value);
    var subtotal = quantidade * precoUnitario;
    document.getElementById('subtotal').innerText = subtotal.toFixed(2);
}