<?php

/**
 * DATASUS - ESQUELETO PADRÃO DE SISTEMAS DO DATASUS
 *
 * Descrição do arquivo (opcional).
 *
 * @author      Marcio Paiva Barbosa <felipe.rosa@saude.gov.br>
 * @copyright   Copyright (c) 2010, DATASUS
 * @package     Datasus_Helpers_
 * @since       Arquivo disponível desde a versão 1.0
 * @version     $Id$
 */

/**
 * Datasus_Helpers_FlashMessages class
 *
 * Classe responsável por gerar mensagens de erros, info, alertas e sucesso
 *
 * @author      Marcio Paiva Barbosa <marcio.barbosa@saude.gov.br>
 * @since       Arquivo disponível desde a versão 1.0
 */
class Helpers_FlashMessages {

    public function flashMessages($translator = NULL) {
        $messages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->getMessages();
        $statMessages = array();
        $output = '';

        if (count($messages) > 0) {
            foreach ($messages as $message) {
                if (!array_key_exists($message['status'], $statMessages))
                    $statMessages[$message['status']] = array();

                if ($translator != NULL && $translator instanceof Zend_Translate)
                    array_push($statMessages[$message['status']], $translator->_($message['message']));
                else
                    array_push($statMessages[$message['status']], $message['message']);
            }

            $output .= "<script type=\"text/javascript\">";
            $output .= " setTimeout(\"closeMensage()\",30000);";
            $output .= " function closeMensage() { ";
            $output .= "    $('#mensage').fadeOut(400); } ";
            $output .= "</script>";
            $output .= "<div id='mensage'>";
            foreach ($statMessages as $status => $messages) {
                $output .= '<div class="' . $status . '">';

                if (count($messages) == 1) {
                    $output .= '<ul>';
                    $output .= '<li>' . $messages[0] . '</li>';
                    $output .= '</ul>';
                } else {
                    $output .= '<ul >';
                    foreach ($messages as $message)
                        $output .= '<li>' . $message . '</li>';
                    $output .= '</ul>';
                }

                $output .= '</div>';
            }
            $output .= "</div>";

            return $output;
        }
    }

}
