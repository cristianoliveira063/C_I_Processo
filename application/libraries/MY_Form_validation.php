<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Form_validation
 *
 * @author 016255421
 */
class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    public function is_unique($str, $field) {
        $field_ar = explode('.', $field);
        $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $str), 1, 0);
        if ($query->num_rows() === 0) {
            return TRUE;
        }

        return FALSE;
    }

    public function data_Valida($str) {

        if (!preg_match("~^\d{2}/\d{2}/\d{4}$~", $str)) { {

                return false;
            }

            $data = explode("/", "$str"); // fatia a string $dat em pedados, usando / como referência
            $d = $data[0];
            $m = $data[1];
            $y = $data[2];

            // verifica se a data é válida!
            // 1 = true (válida)
            // 0 = false (inválida)
            $res = checkdate($m, $d, $y);
            return $res == 1;
        }
    }

}
