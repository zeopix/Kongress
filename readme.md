Kongress

Recuperar objeto de usuario 
$user = $this->get('security.context')->getToken()->getUser()->getPersistObject($this->get('security.context')->getToken(), $em);