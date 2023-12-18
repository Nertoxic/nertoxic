<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$products = new products();

class products Extends mysql 
{

    /*
    * Create a order
    *
    * This function doesnt include payment
    * it will directly create the product
    * without any check. We recommend to
    * use the nicInvoicing to interact
    * with payments. After success payment
    * you can use the order function
    */
    public function order($productid, $userid, $runtime)
    {

        // Check if a runtime is provided
        if($runtime == NULL) {
            $runtime = 3650; // Set runtime to 10 yers
        }

    }

    /*
    * Get Price
    *
    * This function will return a product
    * Price, for example to make a payment
    */
    public function getPrice($productid)
    {

    }

    /*
    * Remove a Prodct
    *
    * This function will remove a product
    * from a user
    */
    public function remove($orderid, $userid)
    {

    }

    /*
    * Get Informations
    *
    * This function will get you all informations
    * about a product
    */
    public function get($orderid)
    {
        // $this->variable = $value;
    }

    /*
    * Remove/add Runtime
    *
    * Remove/add runtime from a product
    */
    public function runtime($orderid, $runtime, $type)
    {

        // Check if runtime should be added or removed
        if($type == "add") {
            // +
        } else {
            // -
        }

    }

    /*
    * Edit Price
    *
    * Edit the Product Price
    */
    public function editPrice($orderid, $price)
    {

    }

    /*
    * Edit the Owner
    *
    * Edit the Owner of a product
    */
    public function editOwner($orderid, $newowner)
    {

    }

    /*
    * List Products
    *
    * List all Product of a customer
    */
    public function list($userid, $limit)
    {

        // Check if limit should be empty
        if($limit == 0) {
            $limit = 10000000; // Set limit high enough to make it look unlimited
        }

    }

    /*
    * Change state
    *
    * Change the state of a product
    * Available: deleted, suspended, active, pending
    */
    public function setSate($orderid)
    {

    }

    /*
    * Change Data
    *
    * Here you can write access data or
    * a key or a link with pw and username
    */
    public function setData($orderid, $data)
    {

    }

}