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

    /**
     * Permet de conjuguer au présent de l'indicatif le verbe passé en paramètre
     * @param string $verbe Le verbe à conjuguer
     * @return string Le verbe conjugué
     * @throws InvalidArgumentException Exception lancée si le verbe n'est pas du 1er groupe
     */
    public function conjuguer(string $verbe): string
    {
        return '';
    }
}