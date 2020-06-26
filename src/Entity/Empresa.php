<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $razao;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $cnpj;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fantasia;

    /**
     * @ORM\OneToMany(targetEntity=Almoxarifado::class, mappedBy="idEmpresa")
     */
    private $idAlmoxarifado;

    /**
     * @ORM\OneToMany(targetEntity=Produto::class, mappedBy="empresa")
     */
    private $produtos;

    public function __construct()
    {
        $this->idAlmoxarifado = new ArrayCollection();
        $this->produtos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRazao(): ?string
    {
        return $this->razao;
    }

    public function setRazao(string $razao): self
    {
        $this->razao = $razao;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getFantasia(): ?string
    {
        return $this->fantasia;
    }

    public function setFantasia(string $fantasia): self
    {
        $this->fantasia = $fantasia;

        return $this;
    }

    /**
     * @return Collection|Almoxarifado[]
     */
    public function getIdAlmoxarifado(): Collection
    {
        return $this->idAlmoxarifado;
    }

    public function addIdAlmoxarifado(Almoxarifado $idAlmoxarifado): self
    {
        if (!$this->idAlmoxarifado->contains($idAlmoxarifado)) {
            $this->idAlmoxarifado[] = $idAlmoxarifado;
            $idAlmoxarifado->setIdEmpresa($this);
        }

        return $this;
    }

    public function removeIdAlmoxarifado(Almoxarifado $idAlmoxarifado): self
    {
        if ($this->idAlmoxarifado->contains($idAlmoxarifado)) {
            $this->idAlmoxarifado->removeElement($idAlmoxarifado);
            // set the owning side to null (unless already changed)
            if ($idAlmoxarifado->getIdEmpresa() === $this) {
                $idAlmoxarifado->setIdEmpresa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Produto[]
     */
    public function getProdutos(): Collection
    {
        return $this->produtos;
    }

    public function addProduto(Produto $produto): self
    {
        if (!$this->produtos->contains($produto)) {
            $this->produtos[] = $produto;
            $produto->setEmpresa($this);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): self
    {
        if ($this->produtos->contains($produto)) {
            $this->produtos->removeElement($produto);
            // set the owning side to null (unless already changed)
            if ($produto->getEmpresa() === $this) {
                $produto->setEmpresa(null);
            }
        }

        return $this;
    }
}
