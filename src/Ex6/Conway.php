<?php


namespace Ex6;


use InvalidArgumentException;

/**
 * Le premier terme de la suite de Conway est posé comme égal à 1. Chaque terme de la suite se construit en annonçant
 * le terme précédent, c'est-à-dire en indiquant combien de fois chacun de ses chiffres se répète.
 * Écrire une fonction qui prend en argument un nombre de ligne et affiche toutes ces lignes de la suite de Conway.
 * @package Ex6
 *
 */
class Conway
{
    const SEPARATOR = PHP_EOL;

    const MSG_VALEUR_NON_NUMERIQUE = 'Vous devez fournir une valeur numérique';

    public function drawLine(string $string): string
    {
        $size = strlen($string);
        $occurrence = 0;
        $previous = $string[0];
        $line = '';
        for ($i = 0; $i < $size; $i++) {
            if ($string[$i] === $previous) {
                $occurrence ++;
            }
            else {
                $line .= $occurrence . $previous;
                $occurrence = 1;
                $previous = $string[$i];
            }
        }
        $line .= $occurrence . $previous;
        return $line;
    }

    /**
     * Permet d'afficher les nbLines de la suite de conway pour le chiffre start, chaque ligne étant séparée par le
     * caractère self::SEPARATOR
     * @param int $nbLines le nombre de ligne de la suite à afficher
     * @param string $start l'élément de début
     * @return string les lignes de la suite séparé par le caractère
     * @throws InvalidArgumentException Si start n'est pas numérique
     */
    public function draw(int $nbLines, string $start = '1'): string
    {
        if (!is_numeric($start)) {
            throw new InvalidArgumentException(self::MSG_VALEUR_NON_NUMERIQUE);
        }

        $line[] = $start;
        for ($i = 1; $i < $nbLines; $i++) {
            $line[] = $this->drawLine($line[$i - 1]);
        }
        return join(self::SEPARATOR, $line);
    }
}