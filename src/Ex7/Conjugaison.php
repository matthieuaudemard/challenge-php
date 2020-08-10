<?php


namespace Ex7;


use InvalidArgumentException;

/**
 * Créer une fonction qui prend une string en argument, l'argument sera un verbe régulier du premier groupe
 * (finissant par "er"). La fonction doit conjuguer ce verbe au présent de l'indicatif.
 * Contrainte:
 * La chaîne passée en argument ne doit pas dépasser 15 caractères ni contenir d'espaces.
 * Vérifiez que la chaîne passée en argument se termine bien par "er".
 * Si le verbe n'est pas du 3ème groupe vous devez lancer une exception du type InvalidArgumentException
 * exemple :
 * Entrée : programmer
 * Sortie :
 * je programme
 * tu programmes
 * il programme
 * nous programmons
 * vous programmez
 * ils programment
 * @package Ex7
 */
class Conjugaison
{

    const MSG_VERBE_NON_1ER_GROUPE = 'Vous devez fournir un verbe du 1er groupe';

    private static $CONJUGAISON = [
        'je' => 'e',
        'tu' => 'es',
        'il' => 'e',
        'nous' => 'ons',
        'vous' => 'ez',
        'ils' => 'ent'
    ];

    /**
     * Permet de conjuguer au présent de l'indicatif le verbe passé en paramètre
     * @param string $verbe Le verbe à conjuguer
     * @return string Le verbe conjugué
     * @throws InvalidArgumentException Exception lancée si le verbe n'est pas du 1er groupe
     */
    public function conjuguer(string $verbe): string
    {
        $matches = [];
        if ($this->est1erGroupe($verbe, $matches)) {
            $radical = $matches[1];
            $result = [];
            $liaison = substr($radical, -1) === 'g' ? 'e' : '';
            foreach (self::$CONJUGAISON as $pronom => $conjug) {
                if ($pronom === 'nous') {
                    $result[] = $pronom . ' ' . $radical . $liaison . $conjug;
                } else {
                    $result[] = $pronom . ' ' . $radical . $conjug;
                }
            }
            return join(PHP_EOL, $result);
        }
        throw new InvalidArgumentException(self::MSG_VERBE_NON_1ER_GROUPE);
    }

    /**
     * @param string $verbe
     * @param array $matches
     * @return false|int
     */
    public function est1erGroupe(string $verbe, array &$matches)
    {
        return preg_match('#([a-zA-Z]{2,13})er$#', $verbe, $matches);
    }
}