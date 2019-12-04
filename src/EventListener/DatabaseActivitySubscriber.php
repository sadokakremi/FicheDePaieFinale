<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 29/11/2019
 * Time: 21:53
 */
namespace App\EventListener;

use App\Entity\Arrondissement;
use App\Entity\User;
use App\Entity\AttestationArretTravail;
use App\Entity\Log;
use App\Repository\LogRepository;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Entity;
use Proxies\__CG__\App\Entity\Banque;
use Psr\Log\LoggerInterface;
use App\Service\UserLog;
use Symfony\Bundle\SecurityBundle\DependencyInjection\SecurityExtension;
use Symfony\Component\Security\Core\Security;


class DatabaseActivitySubscriber implements EventSubscriber
{
    protected $em;

    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->em = $entityManager;

        $this->security = $security;
    }
    // this method can only return the event names; you cannot define a
    // custom method name to execute when each event triggers
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
            Events::postRemove,
            Events::postUpdate,
        ];
    }

    // callback methods must be called exactly like the events they listen to;
    // they receive an argument of type LifecycleEventArgs, which gives you access
    // to both the entity object of the event and the entity manager itself
    public function postPersist(LifecycleEventArgs $args)
    {
        $this->logActivity('persist', $args);
        $user = $this->security->getUser();




    }

    public function postRemove(LifecycleEventArgs $args )
    {
        $this->logActivity('remove', $args );
        $user = $this->security->getUser();
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->logActivity('update', $args);
        $user = $this->security->getUser();
    }




    private function logActivity(string $action, LifecycleEventArgs $args )
    {
        $entity = $args->getObject();
        $user = $this->security->getUser();
        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible

        if  ($entity instanceof Log   ) {
            return;

        }
        $log = new Log();
        $log->setContain($entity->__toText());
        $log->setDate(new \DateTime());
        $log->setType(get_class ($entity). ' '.$action);
        $log->setUser($user);




        $this->em->persist($log);
        $this->em->flush();



    }

}