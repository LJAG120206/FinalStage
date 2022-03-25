<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use Doctrine\ORM\QueryBuilder;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Chemins;
use Symfony\Component\Security\Core\Security;

class CurrentUserExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $security;

    public function  __construct(Security $security)
    {
        $this->security = $security;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?string $operationName = null)
    {
        // récupérer le USER
        $user = $this->security->getUser();
        //dd($user);
        //error_log($user->getRoles()[0]);


        // // Inclure le user dans la requete pour filtrer les résultats à ceux du User connecté.
        // if ($user->getRoles()[0] === "CS") {
            // $rootAlias = $queryBuilder->getRootAliases()[0];

            // if ($resourceClass === Chemins::class) {
            //     $queryBuilder
            //         ->join("$rootAlias.client", "c")
            //         ->andWhere("o.client=c")
            //         ->andWhere("c.customerSuccess = :user")
            //         ->setParameter("user", $user);
            // }
        // }
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, ?string $operationName = null, array $context = [])
    {
        // récupérer le USER
        //$user = $this->security->getUser();
        //dd($user);

    }
}
