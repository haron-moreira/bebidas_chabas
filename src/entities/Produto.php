<?php

namespace HaronMoreira\BebidasChabas\entities;

class Produto
{

    private string $nome;
    private string $fabricante;
    private int $quantidade;
    private string $tipo_volume;
    private string $qtd_em_estoque;
    private bool $status;


    public function __construct($nome, $fabricante, $qtd_em_estoque, $tipo_volume, $quantidade)
    {
        $this->setNome($nome);
        $this->setFabricante($fabricante);
        $this->setQtdEmEstoque($qtd_em_estoque);
        $this->setTipoVolume($tipo_volume);
        $this->setQuantidade($quantidade);

        if ($qtd_em_estoque > 0) {
            $this->setStatus(1);
        } else {
            $this->setStatus(0);
        }

    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = ucwords(strtolower($nome));
    }

    /**
     * @return string
     */
    public function getFabricante(): string
    {
        return $this->fabricante;
    }

    /**
     * @param string $fabricante
     */
    public function setFabricante(string $fabricante): void
    {
        $this->fabricante = ucwords(strtolower($fabricante));
    }

    /**
     * @return int
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    /**
     * @param int $quantidade
     */
    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return string
     */
    public function getTipoVolume(): string
    {
        return $this->tipo_volume;
    }

    /**
     * @param string $tipo_volume
     */
    public function setTipoVolume(string $tipo_volume): void
    {
        $this->tipo_volume = $tipo_volume;
    }

    /**
     * @return string
     */
    public function getQtdEmEstoque(): string
    {
        return $this->qtd_em_estoque;
    }

    /**
     * @param string $qtd_em_estoque
     */
    public function setQtdEmEstoque(string $qtd_em_estoque): void
    {
        $this->qtd_em_estoque = $qtd_em_estoque;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }


}