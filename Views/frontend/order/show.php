<?php 
    if (!isset($_COOKIE["id_user"])) {
        header("Location: index.php");
    }
?>
<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category, 
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.order.order',['getOrder' => $getOrder,]);
    // $this -> view('frontend.footer');

?>