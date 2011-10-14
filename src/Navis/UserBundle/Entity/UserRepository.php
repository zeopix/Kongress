<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
        public function facebookProvider($access_token)
        {
            $em = $this->getEntityManager();
            $facebook = $this->getEntityManager()->getRepository('NavisUserBundle:Facebook')->findBy(array('acces_token' => $access_token));

            if(empty($facebook))
            {
                //si esta vacio creo un objeto, lo relaciono y hago flush

                $user = new User();
                $facebook = new Facebook();

                $facebook->setAccesToken($access_token);

                $em->persist($facebook);
                $user->setFacebook($facebook);
                $user->setUsername("aa");//aqui la idea es pedir el mail
                $em->persist($user);

                $em->flush();

                //user creado

                return $user;
            }else{
                //ya esta creado el user

                return $facebook;
            }
        }
}
