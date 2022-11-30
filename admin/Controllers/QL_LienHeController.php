<?php 
    session_start();
?>
<?php
    class QL_LienHeController extends BaseController
    {
        private $ql_lienheModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('ContactModel');
            $this -> contactModel = new ContactModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $contact = $this -> contactModel -> getAll();

            return $this -> view('frontend.QL_LienHe.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "contact" => $contact,
                                ]);
        }
        
    }