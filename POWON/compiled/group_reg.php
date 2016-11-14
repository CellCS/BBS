<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--REG START-->
<div id="wp" class="wp">
    <div id="ct" class="ptm wp cl">
        <div class="mn">
            <div class="bm" id="main_message">
                <div class="bm_h bbs" id="main_hnav">
                    <h3 id="layer_reginfo_t" class="xs2">Register now</h3>
                </div>
                <p id="returnmessage4"></p>
                <form method="post" autocomplete="off" name="register" id="registerform" action="">
                    <div id="layer_reg" class="bm_c">
                        <div class="mtw">
                            <div id="reginfo_a">
                                <div class="rfm">
                                    <table>
                                        <tr>
                                            <th><span class="rq">*</span><label for="5sMVeV">Group name:</label></th>
                                            <td><input type="text" id="5sMVeV" onblur="checkRegOut('5sMVeV','Please enter group name');" onfocus="checkReg('5sMVeV')" name="groupname" class="px" autocomplete="off" size="25" maxlength="15"/></td>
                                            <td class="tipcol"><i id="tip_5sMVeV" class="p_tip">consist of 3 to 12 characters</i></td>
                                        </tr>
                                        <tr>
                                            <th>Group description:</th>
                                            <td><input type="text" name="groupdescription" class="px" autocomplete="off" size="25" maxlength="15"/></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="layer_reginfo_b">
                        <div class="rfm mbw bw0">
                            <table width="100%">
                                <tr>
                                    <th>&nbsp;</th>
                                    <td>
									<span id="reginfo_a_btn">
									<em>&nbsp;</em>
									<button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit" value="true">
										<strong>Submit</strong>
									</button>
									</span>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function checkReg(obj){
        document.getElementById('tip_'+obj).style.display='block';
    }

    function checkRegOut(obj,test){
        if(document.getElementById(obj).value==''){
            document.getElementById('tip_'+obj).innerHTML='<b style="color:red;">'+test+'</b>';
        }else{
            document.getElementById('tip_'+obj).style.display='none';
        }
    }

    function show(obj){
        document.getElementById(obj).src='verify.php?math='+Math.random();
    }
</script>
<!--REG END-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

