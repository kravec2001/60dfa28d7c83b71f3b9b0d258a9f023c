<?php

namespace App\Security;

use App\Entity\User;
use DateTime;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\PasswordHasher\Hasher\MessageDigestPasswordHasher;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;


class HashPasswordListener implements EventSubscriber
{
    private $container;

    private $passwordEncoder;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->passwordEncoder = new MessageDigestPasswordHasher(
            $this->container->getParameter('encode.algorithm'),
            $this->container->getParameter('encode.use_base64'),
            $this->container->getParameter('encode.iterations')
        );
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();
        if (! $entity instanceof User) {
            return;
        }

        $this->encodePassword($entity);
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();
        if (! $entity instanceof User) {
            return;
        }

        $this->encodePassword($entity);
        // necessary to force the update to see the change
        $em = $args->getEntityManager();
        $meta = $em->getClassMetadata(get_class($entity));
        $em->getUnitOfWork()->recomputeSingleEntityChangeSet($meta, $entity);
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return ['prePersist', 'preUpdate'];
    }

    private function encodePassword(User $entity): void
    {
        $plainPassword = $entity->getPlainPassword();
        if ($plainPassword === null) {
            return;
        }

        $salt = (string) (new DateTime('NOW'))->getTimestamp();

        $encoded = $this->passwordEncoder->hash(
            $plainPassword,
            $salt
        );

        $entity->setPassword($encoded);
        $entity->setSalt($salt);
    }
}