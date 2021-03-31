    $(document).ready(function() {
        //use button click event
        $("#btn").click(function() {
            //get all inpuf field values
            var name = $("#uname").val();
            var email = $("#email").val();
            var password = $("#pwd").val();
            var city = $("#city").val();
            var profile = $("#pp").val();
            //call ajax here
            $.post("includes/processreg.php", {
                    name: name,
                    email: email,
                    password: password,
                    city: city,
                    profile: profile
                },

                function(data, status) {
                    //check result
                    if (data === "success") {
                        $("#response").html("<div class='alert alert-info'>" + data + "</div>");
                    } else {
                        $("#response").html("<div class='alert alert-warning'>" + data + "</div>");
                    }

                });
        });
    });
