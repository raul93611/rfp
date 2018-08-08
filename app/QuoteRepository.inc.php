<?php
class QuoteRepository{
  public static function insert_quote($connection, $quote){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO quotes(id_project, designated_user, code, type_of_bid, total_cost, total_price, comments, payment_terms, address, ship_to, ship_via, taxes, profit, additional, shipping_cost, shipping) VALUES(:id_project, :designated_user, :code, :type_of_bid, :total_cost, :total_price, :comments, :payment_terms, :address, :ship_to, :ship_via, :taxes, :profit, :additional, :shipping_cost, :shipping)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $quote-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':designated_user', $quote-> get_designated_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':code', $quote-> get_code(), PDO::PARAM_STR);
        $sentence-> bindParam(':type_of_bid', $quote-> get_type_of_bid(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_cost', $quote-> get_total_cost(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_price', $quote-> get_total_price(), PDO::PARAM_STR);
        $sentence-> bindParam(':comments', $quote-> get_comments(), PDO::PARAM_STR);
        $sentence-> bindParam(':payment_terms', $quote-> get_payment_terms(), PDO::PARAM_STR);
        $sentence-> bindParam(':address', $quote-> get_address(), PDO::PARAM_STR);
        $sentence-> bindParam(':ship_to', $quote-> get_ship_to(), PDO::PARAM_STR);
        $sentence-> bindParam(':ship_via', $quote-> get_ship_via(), PDO::PARAM_STR);
        $sentence-> bindParam(':taxes', $quote-> get_taxes(), PDO::PARAM_STR);
        $sentence-> bindParam(':profit', $quote-> get_profit(), PDO::PARAM_STR);
        $sentence-> bindParam(':additional', $quote-> get_additional(), PDO::PARAM_STR);
        $sentence-> bindParam(':shipping_cost', $quote-> get_shipping_cost(), PDO::PARAM_STR);
        $sentence-> bindParam(':shipping', $quote-> get_shipping(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
