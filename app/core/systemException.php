<?php 

namespace App\Core;

use Exception;
/**
 * Validation 
 *
 * Clase que se utiliza para validar parámetros de entrada
 *
 * @author Neftalí Acosta <neftaliacosta@jobtify.email>
 * @copyright (c) 2021, JOBTIFY MEXICO SAS
 * @link https://jobtify.mx
 */

class SystemException extends Exception{

    public function errorMessage(bool $warning=false) {
        // Mensaje de error
        if($warning==false){
            $errorMsg = '<div class="alert alert-danger" role="alert"><br>
            Error en la línea: '. $this->getLine() . '<br>' .
            'En el archivo: ' .$this->getFile() . '<br>' .
            'Comentarios: <b>'.$this->getMessage(). '<br>' .
            '</b></div>';
        }else{
            $errorMsg = '<div class="alert alert-warning" role="alert"><br> ' . 
            'Mensaje  : <b>'.$this->getMessage(). '<br>' .
            '</b></div>';
        }
        return $errorMsg;
    }
    
}