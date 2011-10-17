Kongress

Recuperar objeto de usuario 
$user = $this->get('security.context')
  ->getToken()
  ->getUser()
  ->getPersistObject($this->get('security.context')->getToken(), $em ,$this->get('request')->getSession());
  
  TODO:
  
  remove S.C. as parameter. Ineritance? es posible que si ponemos el metodo en el token, se pueda enviar el $this directamente.