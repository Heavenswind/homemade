<?php

App::uses( 'BaseAuthenticate', 'Controller/Component/Auth' );
App::uses( 'User', 'Model' );
App::uses( 'Cook', 'Model' );

class CustomAuthenticate extends BaseAuthenticate {

  public function authenticate( CakeRequest $request, CakeResponse $response ) {
    //echo var_dump( $request );
    $controller =  $request['controller'];

    $table = substr(ucfirst($controller), 0, -1);
    $obj;


    if ( $table == 'User' ) {
      $User = new User();
      $obj = $User->find( 'first',
        array( 'conditions' => array( 'email' => $request->data[$table]['email'] ),
          'fields'    => array( '*' ) ) );
    } else if ( $table == 'Cook' ) {
      $Cook = new Cook();
      $obj = $Cook->find( 'first',
        array( 'conditions' => array( 'email' => $request->data[$table]['email'] ),
          'fields'    => array( '*' ) ) );

      }

    $form_password  = $request->data[$table]['password'];
    $db_hash = $obj[$table]['hash'];
    $db_salt = $obj[$table]['salt'];

    if ( $this->validateLogin( $form_password, $db_hash, $db_salt ) ) {
      return $obj[$table];
    }
    return false;

  }

  function validateLogin( $form_password, $db_hash, $db_salt ) {
    $hashed = User::generateSaltedHash( $form_password, $db_salt );
    return $db_hash == $hashed;
  }


}

?>
