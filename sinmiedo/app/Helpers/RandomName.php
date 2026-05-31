<?php

namespace App\Helpers;

class RandomName
{
    public static function generate(): string
    {
        $adjetivos = [
            'Valiente',
            'Tranquilo',
            'Curioso',
            'Alegre',
            'Sereno',
            'Brillante',
            'Amable',
            'Libre',
            'Fuerte',
            'Gentil',
            'Calmado',
            'Radiante',
            'Dulce',
            'Audaz',
            'Pacífico',
            'Creativo',
            'Sincero',
            'Noble',
            'Tierno',
            'Sabio',
        ];

        $animales = [
            'Delfín',
            'Colibrí',
            'Panda',
            'Zorro',
            'Koala',
            'Nutria',
            'Pingüino',
            'Lechuza',
            'Camaleón',
            'Mariposa',
            'Tortuga',
            'Flamenco',
            'Axolote',
            'Capibara',
            'Jaguar',
            'Lobo',
            'Águila',
            'Cangrejo',
            'Pulpo',
            'Ciervo',
        ];

        $adjetivo = $adjetivos[array_rand($adjetivos)];
        $animal   = $animales[array_rand($animales)];
        $numero   = rand(10, 99);

        return $adjetivo . $animal . $numero;
    }
}
