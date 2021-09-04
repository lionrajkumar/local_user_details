function getDelCityConfirm(id){
    if (confirm('Are you sure wants to delete the city?')) {
        $.ajax({
            url: "/local/user_details/cities.php",
            method:'post',
            async: false,
            data:{'id':id,'method':'del'},
            success:function(res) {
                console.log("Successfully Deleted");
            },
            failure:function(err) {
                console.log(err);
            }
        });
        window.location.href = "/local/user_details/cities.php";
    }
}

