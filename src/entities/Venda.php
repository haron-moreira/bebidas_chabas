<?php

namespace HaronMoreira\BebidasChabas\entities;

class Venda
{
    private array $produtos;
    private int $qtd_produtos;

    public function __construct($produtosDaVenda)
    {
        $this->produtos = $produtosDaVenda['produtos'];
        $this->qtd_produtos = $produtosDaVenda['quantidade_produtos'];
    }

    /**
     * @return int
     */
    public function getQtdProdutos(): int
    {
        return $this->qtd_produtos;
    }

    /**
     * @param int $qtd_produtos
     */
    public function setQtdProdutos(int $qtd_produtos): void
    {
        $this->qtd_produtos = $qtd_produtos;
    }

    /**
     * @return array
     */
    public function getProdutos(): array
    {
        return $this->produtos;
    }

    /**
     * @param array $produtos
     */
    public function setProdutos(array $produtos): void
    {
        $this->produtos = $produtos;
    }

}