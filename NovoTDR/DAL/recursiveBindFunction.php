<?php
    /**
    *
    * Writed with PHP 8
    *
    * @category   Facilitator
    * @author     Hugo Henrique <mxhugoxm@gmail.com>
    * @author     JLowborn <deadhunt50@gmail.com>
    * @version    0.1.0
    * @since      File available since Release 0.1.0
    *
    */

    #REGEX search for words that starts with : and end with [a-Z0-9]
    define("REGEX","/\:\w*/m");

    class BindAllValues{
        /**
        *   Function bind all values of a query
        *   @param object $link
        *   @param string $sql
        *   @param array $values
        *   @return void
        */
        public function __construct($link,$sql,$values){
            preg_match_all(REGEX, $sql, $matches, PREG_SET_ORDER, 0);
            foreach ($matches as $key => $match) {
                $link->bindValue($match[0],$values[$key]);
            }
        }
    }

    class BindAllParams{
        /**
        *   Function bind all params of a query
        *   @param object $link
        *   @param string $sql
        *   @param array $values
        *   @return void
        */
        public function __construct($link,$sql,$values){
            preg_match_all(REGEX, $sql, $matches, PREG_SET_ORDER, 0);
            foreach ($matches as $key => $match) {
                $link->bindParam($match[0],$values[$key]);
            }
        }
    }
?>
