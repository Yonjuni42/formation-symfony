<?php

namespace AppBundle\Services\Security;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserSecurity
 * @package AppBundle\Services\Security
 */
class UserSecurity
{
    /**
     * @var EncoderFactoryInterface
     */
    var $encoderFactory;

    /**
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param User $entity
     */
    protected function updatePassword(User $entity)
    {
        if(0 !== strlen($password = $entity->getPlainPassword())) {
            $hashed = $this->encoderFactory->getEncoder($entity)->encodePassword($password, $entity->getSalt());
            $entity->setPassword($hashed);
            $entity->eraseCredentials();
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof User) {
            $this->updatePassword($entity);
        }
    }
}