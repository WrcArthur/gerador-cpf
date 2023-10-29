<?php

class Gerador
{
    private $primeirosNove;

    public function __construct()
    {
        for ($i = 0; $i < 9; $i++) {
            $this->primeirosNove .= rand(0, 9);
        }
    }

    public function geraCpf(): string
    {
        $digitos = $this->primeirosNove;
        return $digitos.$this->geraPrimeiroDigito($digitos).$this->geraSegundoDigito($digitos, $this->geraPrimeiroDigito($digitos));
    }

    public function geraPrimeiroDigito(string $digitos): int
    {
        $resultado = 0;
        for ($i = 0, $divisor = 10; $i < 9; $i++, $divisor--) {
            $resultado = $resultado + ($digitos[$i] * $divisor);
        }

        if (($resultado % 11) < 2) {
            return 0;
        } else {
            return (11 - ($resultado % 11));
        }
    }

    public function geraSegundoDigito(string $digitos, int $segundo): int
    {
        $resultado = 0;
        for ($i = 0, $divisor = 11; $i < 9; $i++, $divisor--) {
            $resultado = $resultado + ($digitos[$i] * $divisor);
        }
        $resultado = $resultado + ($segundo *    2);
        if (($resultado % 11) < 2) {
            return 0;
        } else {
            return (11 - ($resultado % 11));
        }
    }
}
