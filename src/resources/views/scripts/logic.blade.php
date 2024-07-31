<script type="text/javascript">

    // console.log('executing js here..')
    $(document).ready(function () {
        $("#otp").keyup(function () {
            let otp = $(this).val();
            console.log('executing js here..', otp)
            let otp_verify = $("#otp_verify").val();

            if (otp === otp_verify) {
                document.getElementById("otp_btn").removeAttribute("disabled");
            }

        });
    });
</script>
