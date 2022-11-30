<?php 
    $this -> view('frontend.order_view.order_view',
                [
                    'user_order' => $user_order,
                    'order_detail' => $order_detail,
                ]);

?>