<?php


namespace Ex3;

use InvalidArgumentException;

/**
 * Créer une fonction qui prend un argument de type int, cela déterminera la hauteur (en ligne)
 * d'un triangle isocèle rempli d'étoiles.
 * Ainsi :
 * - generate(0) :
 * ''
 *
 * - generate(1) :
 * '**'
 *
 * - generate(10) :
 * '         **         '
 * '        ****        '
 * '       ******       '
 * '      ********      '
 * '     **********     '
 * '    ************    '
 * '   **************   '
 * '  ****************  '
 * ' ****************** '
 * '********************'
 * NB : Il est possible d'utiliser les fonctions suivantes :
 * @link str_repeat https://www.php.net/manual/fr/function.str-repeat.php
 * @link str_pad https://www.php.net/manual/fr/function.str-pad.php
 * @package Ex3
 */
class TriangleGenerator
{
    const STAR = '**';
    const SPACE = ' ';
    const MSG_NB_NEGATIF = 'Vous devez fournir un nombre positif';
    const LINE_JUMP = PHP_EOL;

    /**
     * Affiche un triangle isocèle de côté $taille par affichage successif du caractère self::STAR
     * @param int $taille taille du côté du triangle
     * @return string contient le triangle dans son ensemble, chaque ligne étant séparée par le caractère self::LINE_JUMP
     * @throws InvalidArgumentException si $taille < 0
     */
    public function generate(int $taille): string
    {
        if ($taille < 0) {
            throw new InvalidArgumentException(self::MSG_NB_NEGATIF);
        }

        $result = [];
        for ($i = 0; $i < $taille; $i++) {
            $star = str_repeat(self::STAR, $i + 1);
            $result []= str_pad($star, $taille * strlen(self::STAR), self::SPACE, STR_PAD_BOTH);
        }
        return join(self::LINE_JUMP, $result);
    }
}