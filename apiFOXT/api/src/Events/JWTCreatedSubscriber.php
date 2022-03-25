<?php

namespace App\Events;

use App\Entity\Clients;
use Doctrine\ORM\QueryBuilder;
use App\Entity\CustomerSuccess;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryBuilderHelper;
use App\Entity\Experts;

class JWTCreatedSubscriber{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function updateJwtData(JWTCreatedEvent $event)
    {
        // récupérer les données à rajouter dans le TOKEN
        $user = $event->getUser();

        if ($user->getRoles() === ["CLIENT"]) {
            $seekClient = $this->entityManager->createQueryBuilder();
            $seekClient
                ->select("c")
                ->from(Clients::class,"c")
                ->where("c.email = :mailUser")
                ->setParameter("mailUser", $user->getUserIdentifier());
            
            $result = $seekClient->getQuery()->getArrayResult();
        }
        elseif ($user->getRoles() === ["CS"]) {
            $seekCustomerSuccess = $this->entityManager->createQueryBuilder();
            $seekCustomerSuccess
                ->select("c")
                ->from(CustomerSuccess::class,"c")
                ->where("c.email = :mailUser")
                ->setParameter("mailUser", $user->getUserIdentifier());
            
            $result = $seekCustomerSuccess->getQuery()->getArrayResult();
        }
        elseif ($user->getRoles() === ["EXPERT"]) {
            $seekExpert = $this->entityManager->createQueryBuilder();
            $seekExpert
                ->select("c")
                ->from(Experts::class,"c")
                ->where("c.email = :mailUser")
                ->setParameter("mailUser", $user->getUserIdentifier());
            
            $result = $seekExpert->getQuery()->getArrayResult();
        }

        $data = $event->getData();
        $data["prenom"] = $user->getPrenom();
        $data["nom"] = $user->getNom();
        $data["id"] = $user->getId();
        $data["type2"]= $result;
        $event->setData($data);

    }
}