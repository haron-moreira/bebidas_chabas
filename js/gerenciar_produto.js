function remove(id_produto, nome_produto)
{
    document.getElementById("nome_produto_remove").value = nome_produto
    document.getElementById("id_produto_remove").value = id_produto
}

function ativa(id_produto, nome_produto)
{
    document.getElementById("nome_produto_ativa").value = nome_produto
    document.getElementById("id_produto_ativa").value = id_produto
}

function atualiza(qtd_atual, id_produto, nome_produto)
{
    document.getElementById("nome_produto_atualiza").value = nome_produto
    document.getElementById("id_produto_atualiza").value = id_produto
    document.getElementById("qtd_atual").value = qtd_atual
}