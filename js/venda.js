const produto = document.getElementById("produto")
const button = document.getElementById("submitBtn")
const lista = document.getElementById('autocompleteList')
const valorFim = document.getElementById("footer")
var soma = 0;
var json_produtos = {}
json_produtos = { "produtos": []}
var produtosList = {}

produto.addEventListener("click", () => {

        if (produto.value.length === 0) {
            lista.innerHTML = '';
        }
})

produto.addEventListener("keyup", () => {


        if (produto.value.length === 0) {
            lista.innerHTML = '';
        }

        if (produto.value.length >= 3) {
            $.ajax({
                url: '/api/findItems.php?search='+produto.value,
                method: 'GET',
                dataType: 'json'
            })
                .fail(function(result) {

                })
                .done(function(result){
                    lista.innerHTML = '';

                result.forEach((item) => {

                    if (item.id_produto in json_produtos.produtos) {
                    } else {
                        const listItem = document.createElement('p');
                        listItem.textContent = item.nome_produto
                        listItem.setAttribute("id",item.id_produto)
                        listItem.setAttribute("value",item.valor_unitario)
                        listItem.setAttribute("name",item.nome_produto)
                        listItem.setAttribute("onclick","adicionar_para_venda(this)")
                        listItem.style.cursor = 'pointer'
                        lista.appendChild(listItem)
                    }
                })

                });

        }

})

function removeall() {
    let tbody = document.getElementById("tbody");
    tbody.innerHTML = "";
    json_produtos = {}
    produtosList = {}
    soma = 0
    valorFim.innerHTML = `<b>Valor final da venda: R$ 0,00<b>`
}

function adicionar_para_venda(elemento) {

    lista.innerHTML = "";
    produto.value = "";

    let tbody = document.getElementById("tbody");

            let row = document.createElement("tr");

            let id = document.createElement("td");
            id.textContent = elemento.id

            let nome = document.createElement("td");
            nome.textContent = elemento.getAttribute('name')

            let valor = document.createElement("td");
            valor.textContent = "R$ "+ (elemento.getAttribute('value') / 100).toFixed(2).toString();

            let qtd_selecionada = document.createElement("td");
            qtd_selecionada.innerHTML = "<input id='"+elemento.id+"_qtd' onchange='somaMultipla(this)' price='"+elemento.getAttribute('value')+"' value='1' type='number' min='0' style='width: 3vw;'>"

            row.appendChild(id);
            row.appendChild(nome);
            row.appendChild(valor);
            row.appendChild(qtd_selecionada);

            tbody.appendChild(row);

            soma = soma + ((elemento.getAttribute('value') / 100) * document.getElementById(elemento.id+'_qtd').value)
            valorFim.innerHTML = `<b>Valor final da venda: R$ ${soma.toFixed(2).toLocaleString('pt-BR')}<b>`
            produtosList[elemento.id] = {"name": `${elemento.getAttribute('name')}`, "quantidade": document.getElementById(elemento.id+'_qtd').value, "valor_unitario": elemento.getAttribute('value')}

            json_produtos = {"soma":soma.toFixed(2),
                                "produtos": produtosList }

            console.log(json_produtos)
}

function somaMultipla(elemento) {
    soma = 0
     let id = elemento.id.substring(0, elemento.id.indexOf("_"));

    json_produtos.produtos[id].quantidade = elemento.value

    for (let produto in json_produtos.produtos) {
        soma = soma + json_produtos.produtos[produto].quantidade * json_produtos.produtos[produto].valor_unitario
    }

    json_produtos.soma = soma

    console.log(json_produtos)
    soma = soma / 100
    valorFim.innerHTML = `<b>Valor final da venda: R$ ${soma.toFixed(2).toLocaleString('pt-BR')}<b>`

}

function concluir() {
    $.ajax({
        url: '/api/vender-via-front.php',
        method: 'POST',
        data: {'produtos': json_produtos},
        dataType: 'json'
    })
        .fail(function(result) {

        })
        .done(function(result){
            alert("Venda realizada com sucesso");
            /*console.log(result)*/
            location.reload();

        });
}
