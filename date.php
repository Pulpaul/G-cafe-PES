<form method="post" onsubmit="return error()">
	<span id="errorDate" style="color: red;"></span> <br/> 
	<input type="date" name="date" id="date"> <br/> 
	<button type="submit">Send</button>
</form>

<script type="text/javascript">  

        function error(){
          var a = document.getElementById("date").value; 

          if (a < "2018-08-29") {
            document.getElementById("errorDate").innerHTML=" Error!";
            return false;
          } 

        } 
</script>