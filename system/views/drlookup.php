<style type="text/css">
    .tblhead{
        font-size: 20px;
    }
    .lookup{
        font-size: 18px;
        border: 0;
        outline: none;
        background: none;
    }
    .holder{
        background-image: url(http://intranet/images/form.gif);
    }
    #ajaxDiv{
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        line-height: 150%;        
    }
</style>
<script type="text/javascript">

    function ajaxtable(text){
        document.body.style.cursor = "wait";
        document.getElementById('columninput').value  = text;
        document.getElementById('tableinput').value  = '';
        setTimeout(function(){ ajax(text,'column/','columninput','s');document.body.style.cursor = "default";},500);
    }
    function ajaxcol(text){
        document.body.style.cursor = "wait";
        document.getElementById('tableinput').value  = text;
        document.getElementById('columninput').value  = '';
        setTimeout(function(){ ajax(text,'table/','columninput','s');document.body.style.cursor = "default";},500);
    }

    function select100(text){
        document.body.style.cursor = "wait";
//        document.getElementById('tableinput').value  = text;
//        document.getElementById('columninput').value  = '';
        document.body.style.width='1500%'
        setTimeout(function(){ ajax(text,'top100/','columninput','');document.body.style.cursor = "default";},500);

    }
    function ajax(text,which,coltab,strict){

        var ajaxRequest;  // The variable that makes Ajax possible!
        var ajaxDisplay = document.getElementById('ajaxDiv');

        ajaxDisplay.innerHTML = '<img src="/blankMVC/images/loading.gif" border="0" alt="Please wait... " />';
        try{
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        // Create a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                //                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
        ajaxRequest.open("GET", "http://herxdsk074/blankMVC/dr/"+strict+which + text, true);
        ajaxRequest.send(null);
        
    }
</script>

<table>
    <form action="">

        <tr><td class="tblhead">Tables: <td><div class="holder"><input type="text" class="lookup" onkeyup="ajax(this.value,'table/','columninput','')" id="tableinput"/></div> <td class="tblhead">BAR Account: <td><div class="holder"><input type="text" class="lookup" onkeyup="ajax(this.value,'baracct/','columninput','')" id="tableinput"/></div> </tr>

        <tr><td class="tblhead">Columns: <td><div class="holder"><input type="text" class="lookup" onkeyup="ajax(this.value,'column/','tableinput','')" id="columninput"/></div>  <td class="tblhead">ADM - MRI Account: <td><div class="holder"><input type="text" class="lookup" onkeyup="ajax(this.value,'admacct/','columninput','')" id="tableinput"/></div> </tr>
    </form>
</table>

<div id='ajaxDiv'>Your result will display here</div>