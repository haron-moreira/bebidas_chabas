function remove(id_produto, nome_produto)
{
    document.getElementById("nome_usuario_remove").value = nome_produto
    document.getElementById("id_usuario_remove").value = id_produto
}

function ativa(id_produto, nome_produto)
{
    document.getElementById("nome_usuario_ativa").value = nome_produto
    document.getElementById("id_usuario_ativa").value = id_produto
}

function atualiza(nv_acesso, id_produto, nome_produto)
{
    document.getElementById("nome_usuario_atualiza").value = nome_produto
    document.getElementById("id_usuario_atualiza").value = id_produto
    document.getElementById("nv_acesso").value = nv_acesso
}

function reset_senha(id_usuario, nome_usuario) {
    window.location.href = "lib/gerar_senha.php?id="+id_usuario+"&nome="+nome_usuario
}