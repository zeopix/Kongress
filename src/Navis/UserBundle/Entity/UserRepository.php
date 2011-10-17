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

        /*
         * Este metodo busca econ los datos de facebook a un usuario para devolver su objeto. Si no existe lo crea
         */
        public function facebookProvider($attr)
        {
            $em = $this->getEntityManager();
            
            $facebook = $this->getEntityManager()->getRepository('NavisUserBundle:Facebook')->findOneBy(array('idClient' => $attr['clientId']));

            if(empty($facebook))
            {
                //si esta vacio creo un objeto, lo relaciono y hago flush

                $user = new User();
                $facebook = new Facebook();
               
                $facebook->setIdClient($attr['clientId']);
                $facebook->setAccesToken($attr['access_token']);
                $facebook->setExpiresAt($attr['expiresAt']);

                $json = $attr['json'];
                $em->persist($facebook);
                $user->setFacebook($facebook);
                $user->setUsername($json->name);//aqui la idea es pedir el mail
                $user->setExpiresAt(0);
                $user->setAccessToken(0);
                $em->persist($user);

                
                $facebook->setUser($user);
                $em->persist($facebook);

                $em->flush();

                //user creado

                return $user;
            }else{
                //ya esta creado el user
                return $facebook->getUser();
            }
        }

    public function googleProvider($attr)
    {
       $em = $this->getEntityManager();

        $google = $this->getEntityManager()->getRepository('NavisUserBundle:Google')->findOneBy(array('clientId' => $attr['clientId']));

            if(empty($facebook))
            {
                //si esta vacio creo un objeto, lo relaciono y hago flush

                $user = new User();
                $google = new Google();

                $google->setClientId($attr['clientId']);
                $google->setAccesToken($attr['access_token']);
                $google->setExpiresAt($attr['expiresAt']);

                $json = $attr['json'];
                $em->persist($google);
                $user->setFacebook($google);
                $user->setUsername($json->name);//aqui la idea es pedir el mail
                $user->setExpiresAt(0);
                $user->setAccessToken(0);
                $em->persist($user);

                $google->setUser($user);
                $em->persist($google);
                $em->flush();

                //user creado

                return $user;
            }else{
                //ya esta creado el user

                return $google->getUser();
            }
    }

    /*
     * Creamos un token que durara 5 minutos
     */

    public function createToken(\Navis\UserBundle\Entity\User $user)
    {
        $token = sha1(time().$user->getSecretToken());

        $user->setAccessToken($token);
        $user->setExpiresAt(time()+300);//añado 5 minutos al tiempo de expiracion del token

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        

        return $token;
    }
}
