<script type="text/javascript">
    function myfunction(){

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        console.log(name, email, password);
        if(name!=="" && email!=="" && password!==""){
            document.getElementById("registerform").submit();
        } else {
            console.log(name, email, password);
        }
    }
</script>
