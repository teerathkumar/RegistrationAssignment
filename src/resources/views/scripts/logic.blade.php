<script type="text/javascript">

    // console.log('executing js here..')
    $(document).ready(function () {
        var otp_verify = $("#otp_verify").val();
        setTimeout(()=>{
            $("#otp").val(otp_verify);
            $("#otp").trigger("keyup")
        },1500);
        $("#otp").keyup(function () {
            let otp = $(this).val();
            console.log('executing js here..', otp)
            grecaptcha.execute();


            if (otp === otp_verify) {
                // document.getElementById("otp_btn").removeAttribute("disabled");
                // onload();

            }

        });
    });
</script>
