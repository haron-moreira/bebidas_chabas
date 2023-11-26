const produto = document.getElementById("produto")
const button = document.getElementById("submitBtn")
const lista = document.getElementById('autocompleteList')
const valorFim = document.getElementById("footer")
var soma = 0;
var json_produtos = {}
json_produtos = { "produtos": []}
var produtosList = {}
var pagamento = false
var dados = {}

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
    json_produtos = { "produtos": []}
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
            qtd_selecionada.innerHTML = "<input id='"+elemento.id+"_qtd' onchange='somaMultipla(this)' price='"+elemento.getAttribute('value')+"' value='1' type='number' min='0' style='width: 80px;padding: 1vh'>"

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

            /*console.log(json_produtos)*/
}

function somaMultipla(elemento) {
    soma = 0
     let id = elemento.id.substring(0, elemento.id.indexOf("_"));

    json_produtos.produtos[id].quantidade = elemento.value

    for (let produto in json_produtos.produtos) {
        soma = soma + json_produtos.produtos[produto].quantidade * json_produtos.produtos[produto].valor_unitario
    }

    json_produtos.soma = soma / 100

    /*console.log(json_produtos)*/
    soma = soma / 100
    valorFim.innerHTML = `<b>Valor final da venda: R$ ${soma.toFixed(2).toLocaleString('pt-BR')}<b>`

}

function pagamento_posterior() {
    pagamento = !pagamento
    console.log(pagamento)
}

function defineDados(nome, email, tel) {
    dados['nome'] = nome
    dados['email'] = email
    dados['tel'] = tel
}

function concluir() {



    if (pagamento) {
        pagamento = 0

        let nome = prompt("Insira o nome do responsável pelo pagamento posterior.")
        let email = prompt("Insira o e-mail do responsável pelo pagamento posterior.")
        let telefone = prompt("Insira o telefone do responsável pelo pagamento posterior.")

        defineDados(nome, email, telefone)

    } else {
        pagamento = 1
    }

    $.ajax({
        url: '/api/vender-via-front.php',
        method: 'POST',
        data: {'produtos': json_produtos, 'pagamento_posterior': pagamento, 'dados_cliente': dados},
        dataType: 'json'
    })
        .always(function(result) {
            console.log({'pr': json_produtos, 'pg': pagamento})
            switch (result.status) {
                case 200:
                    alert("Venda realizada com sucesso");

                    json_produtos = JSON.stringify(json_produtos)
                    json_produtos = encodeURIComponent(json_produtos)

                    window.open("/api/getNota.php?compra=" + json_produtos, "_blank");
                    location.reload();
                    break;

                case 401:
                    alert(`O produto ${result.responseJSON.produto} possui somente ${result.responseJSON.qtd} em estoque. \nPortanto a venda não pode ser finalizada.`);
                    break;

                case 500:
                    alert("Erro ao processar a venda");
                    break;

                default:
                    alert("Erro interno");
                    break;
            }
        });
}
