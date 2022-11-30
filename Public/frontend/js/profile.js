$(document).ready(function () {
    // btn-contact
    $(".btn-save").click(function() {
        var name = $(".txtName").val();
        var phone = $(".txtPhone").val();
        var email = $(".txtEmail").val();
        let arr = email.split('@');
        var address = $(".txtAddress").val();
        var city = $(".slCity").val();
        var txt_city = $(".slCity :selected").text();
        var district = $(".slDistrict").val();
        var txt_district = $(".slDistrict :selected").text();
        var ward = $(".slWard").val();
        var txt_ward = $(".slWard :selected").text();


        if (name == "" || phone == "" || email == "" || address == "" || city == "" || district == "" || ward == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thông báo',
                text: "Vui lòng nhập đầy đủ các trường",
                showConfirmButton: false,
                iconColor: 'red',
                denyButtonText: 'Đóng',
                showDenyButton: true,
            })
        } else if (name != "" || phone != "" || email != "" || address != "" || city != "" || district != "" || ward != "") {
            $.ajax ({
                url: "index.php?controller=profile&action=update",
                type: "POST",
                data: {name: name, phone: phone, email: email, arr0: arr[0],arr1: arr[1], address: address, city: city, txt_city: txt_city, district: district, txt_district: txt_district, ward: ward, txt_ward: txt_ward},
                success: function(data) {
                    // console.log(data);
                    if (data == "Thành công") {
                        // location.reload();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Thông báo',
                            text: "Cập nhật thành công",
                            showConfirmButton: false,
                            iconColor: 'green',
                            timer: '1000',
                        })
                        
                    }
                    else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Thông báo',
                            text: data,
                            showConfirmButton: false,
                            iconColor: 'red',
                            denyButtonText: 'Đóng',
                            showDenyButton: true,
                        })
                    }       

                }
            });
        }
    });

    
});


