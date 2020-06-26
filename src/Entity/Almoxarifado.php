<?php

namespace App\Entity;

use App\Repository\AlmoxarifadoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlmoxarifadoRepository::class)
 */
class Almoxarifado
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="idAlmoxarifado")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEmpresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdEmpresa(): ?Empresa
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa(?Empresa $idEmpresa): self
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

}
