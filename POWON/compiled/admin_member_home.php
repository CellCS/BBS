<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--LIST start-->
<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z">
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="admin_member_list.php">Admin Center</a><em>&raquo;</em><a href="admin_member_list.php">Member List</a><em>&raquo;</em><a><?php echo $result[0]['username']; ?></a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_group">
                        <dt><a href="javascript:;" title="Posts">Members</a></dt>
                        <dd class="bdl_a">
                            <a href="admin_member_list.php" title="Post List">Member List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Groups</a></dt>
                        <dd>
                            <a href="admin_group_list.php" title="Member List">Group List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Public Post</a></dt>
                        <dd>
                            <a href="admin_postlist.php" title="Member List">Public Post List</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn" style="margin-left:15px;">
                <div class="bm bw0">
                    <form action="admin_member_home.php" method="post" autocomplete="off">
                        <table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
                            <tr>
                                <th>username</th>
                                <td><?php echo $result[0]['username']; ?></td>
                                <td>&nbsp</td>
                                <td>&nbsp </td>
                            </tr>
                            <tr id="tr_firstname">
                                <th id="tr_firstname">First Name</th>
                                <td id="tr_firstname">
                                    <input type="text" name="firstname" class="px" value="<?php echo $result[0]['firstname']; ?>" />
                                </td>
                            </tr>
                            <tr id="tr_lastname">
                                <th id="tr_lastname">Last Name</th>
                                <td id="tr_lastname">
                                    <input type="text" name="lastname" class="px" value="<?php echo $result[0]['lastname']; ?>" />
                                </td>
                            </tr>
                            <tr id="tr_gender">
                                <th id="th_gender">Gender</th>
                                <td id="td_gender">
                                    <select name="sex" id="sex" class="ps">
                                        <option value="0" <?php if($result[0]['sex']==0){?>selected="selected"<?php }?>>secret</option>
                                        <option value="1" <?php if($result[0]['sex']==1){?>selected="selected"<?php }?>>femal</option>
                                        <option value="2" <?php if($result[0]['sex']==2){?>selected="selected"<?php }?>>male</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="tr_birthday">
                                <th id="th_birthday">Birthday</th>
                                <td id="td_birthday">
                                    <select name="birthyear" id="birthyear" class="ps" onchange="showbirthday();">
                                        <option value="2016"<?php if($yBirthday == 2016){?>selected="selected"<?php }?>>2016</option>
                                        <option value="2015"<?php if($yBirthday == 2015){?>selected="selected"<?php }?>>2015</option>
                                        <option value="2014"<?php if($yBirthday == 2014){?>selected="selected"<?php }?>>2014</option>
                                        <option value="2013"<?php if($yBirthday == 2013){?>selected="selected"<?php }?>>2013</option>
                                        <option value="2012"<?php if($yBirthday == 2012){?>selected="selected"<?php }?>>2012</option>
                                        <option value="2011"<?php if($yBirthday == 2011){?>selected="selected"<?php }?>>2011</option>
                                        <option value="2010"<?php if($yBirthday == 2010){?>selected="selected"<?php }?>>2010</option>
                                        <option value="2009"<?php if($yBirthday == 2009){?>selected="selected"<?php }?>>2009</option>
                                        <option value="2008"<?php if($yBirthday == 2008){?>selected="selected"<?php }?>>2008</option>
                                        <option value="2007"<?php if($yBirthday == 2007){?>selected="selected"<?php }?>>2007</option>
                                        <option value="2006"<?php if($yBirthday == 2006){?>selected="selected"<?php }?>>2006</option>
                                        <option value="2005"<?php if($yBirthday == 2005){?>selected="selected"<?php }?>>2005</option>
                                        <option value="2004"<?php if($yBirthday == 2004){?>selected="selected"<?php }?>>2004</option>
                                        <option value="2003"<?php if($yBirthday == 2003){?>selected="selected"<?php }?>>2003</option>
                                        <option value="2002"<?php if($yBirthday == 2002){?>selected="selected"<?php }?>>2002</option>
                                        <option value="2001"<?php if($yBirthday == 2001){?>selected="selected"<?php }?>>2001</option>
                                        <option value="2000"<?php if($yBirthday == 2000){?>selected="selected"<?php }?>>2000</option>
                                        <option value="1999"<?php if($yBirthday == 1999){?>selected="selected"<?php }?>>1999</option>
                                        <option value="1998"<?php if($yBirthday == 1998){?>selected="selected"<?php }?>>1998</option>
                                        <option value="1997"<?php if($yBirthday == 1997){?>selected="selected"<?php }?>>1997</option>
                                        <option value="1996"<?php if($yBirthday == 1996){?>selected="selected"<?php }?>>1996</option>
                                        <option value="1995"<?php if($yBirthday == 1995){?>selected="selected"<?php }?>>1995</option>
                                        <option value="1994"<?php if($yBirthday == 1994){?>selected="selected"<?php }?>>1994</option>
                                        <option value="1993"<?php if($yBirthday == 1993){?>selected="selected"<?php }?>>1993</option>
                                        <option value="1992"<?php if($yBirthday == 1992){?>selected="selected"<?php }?>>1992</option>
                                        <option value="1991"<?php if($yBirthday == 1991){?>selected="selected"<?php }?>>1991</option>
                                        <option value="1990"<?php if($yBirthday == 1990){?>selected="selected"<?php }?>>1990</option>
                                        <option value="1989"<?php if($yBirthday == 1989){?>selected="selected"<?php }?>>1989</option>
                                        <option value="1988"<?php if($yBirthday == 1988){?>selected="selected"<?php }?>>1988</option>
                                        <option value="1987"<?php if($yBirthday == 1987){?>selected="selected"<?php }?>>1987</option>
                                        <option value="1986"<?php if($yBirthday == 1986){?>selected="selected"<?php }?>>1986</option>
                                        <option value="1985"<?php if($yBirthday == 1985){?>selected="selected"<?php }?>>1985</option>
                                        <option value="1984"<?php if($yBirthday == 1984){?>selected="selected"<?php }?>>1984</option>
                                        <option value="1983"<?php if($yBirthday == 1983){?>selected="selected"<?php }?>>1983</option>
                                        <option value="1982"<?php if($yBirthday == 1982){?>selected="selected"<?php }?>>1982</option>
                                        <option value="1981"<?php if($yBirthday == 1981){?>selected="selected"<?php }?>>1981</option>
                                        <option value="1980"<?php if($yBirthday == 1980){?>selected="selected"<?php }?>>1980</option>
                                        <option value="1979"<?php if($yBirthday == 1979){?>selected="selected"<?php }?>>1979</option>
                                    </select>&nbsp;
                                    <select name="birthmonth" id="birthmonth" class="ps">
                                        <option value="1"<?php if($mBirthday == 1){?>selected="selected"<?php }?>>1</option>
                                        <option value="2"<?php if($mBirthday == 2){?>selected="selected"<?php }?>>2</option>
                                        <option value="3"<?php if($mBirthday == 3){?>selected="selected"<?php }?>>3</option>
                                        <option value="4"<?php if($mBirthday == 4){?>selected="selected"<?php }?>>4</option>
                                        <option value="5"<?php if($mBirthday == 5){?>selected="selected"<?php }?>>5</option>
                                        <option value="6"<?php if($mBirthday == 6){?>selected="selected"<?php }?>>6</option>
                                        <option value="7"<?php if($mBirthday == 7){?>selected="selected"<?php }?>>7</option>
                                        <option value="8"<?php if($mBirthday == 8){?>selected="selected"<?php }?>>8</option>
                                        <option value="9"<?php if($mBirthday == 9){?>selected="selected"<?php }?>>9</option>
                                        <option value="10"<?php if($mBirthday == 10){?>selected="selected"<?php }?>>10</option>
                                        <option value="11"<?php if($mBirthday == 11){?>selected="selected"<?php }?>>11</option>
                                        <option value="12"<?php if($mBirthday == 12){?>selected="selected"<?php }?>>12</option>
                                    </select>&nbsp;
                                    <select name="birthday" id="birthday" class="ps">
                                        <option value="1"<?php if($dBirthday == 1){?>selected="selected"<?php }?>>1</option>
                                        <option value="2"<?php if($dBirthday == 2){?>selected="selected"<?php }?>>2</option>
                                        <option value="3"<?php if($dBirthday == 3){?>selected="selected"<?php }?>>3</option>
                                        <option value="4"<?php if($dBirthday == 4){?>selected="selected"<?php }?>>4</option>
                                        <option value="5"<?php if($dBirthday == 5){?>selected="selected"<?php }?>>5</option>
                                        <option value="6"<?php if($dBirthday == 6){?>selected="selected"<?php }?>>6</option>
                                        <option value="7"<?php if($dBirthday == 7){?>selected="selected"<?php }?>>7</option>
                                        <option value="8"<?php if($dBirthday == 8){?>selected="selected"<?php }?>>8</option>
                                        <option value="9"<?php if($dBirthday == 9){?>selected="selected"<?php }?>>9</option>
                                        <option value="10"<?php if($dBirthday == 10){?>selected="selected"<?php }?>>10</option>
                                        <option value="11"<?php if($dBirthday == 11){?>selected="selected"<?php }?>>11</option>
                                        <option value="12"<?php if($dBirthday == 12){?>selected="selected"<?php }?>>12</option>
                                        <option value="13"<?php if($dBirthday == 13){?>selected="selected"<?php }?>>13</option>
                                        <option value="14"<?php if($dBirthday == 14){?>selected="selected"<?php }?>>14</option>
                                        <option value="15"<?php if($dBirthday == 15){?>selected="selected"<?php }?>>15</option>
                                        <option value="16"<?php if($dBirthday == 16){?>selected="selected"<?php }?>>16</option>
                                        <option value="17"<?php if($dBirthday == 17){?>selected="selected"<?php }?>>17</option>
                                        <option value="18"<?php if($dBirthday == 18){?>selected="selected"<?php }?>>18</option>
                                        <option value="19"<?php if($dBirthday == 19){?>selected="selected"<?php }?>>19</option>
                                        <option value="20"<?php if($dBirthday == 20){?>selected="selected"<?php }?>>20</option>
                                        <option value="21"<?php if($dBirthday == 21){?>selected="selected"<?php }?>>21</option>
                                        <option value="22"<?php if($dBirthday == 22){?>selected="selected"<?php }?>>22</option>
                                        <option value="23"<?php if($dBirthday == 23){?>selected="selected"<?php }?>>23</option>
                                        <option value="24"<?php if($dBirthday == 24){?>selected="selected"<?php }?>>24</option>
                                        <option value="25"<?php if($dBirthday == 25){?>selected="selected"<?php }?>>25</option>
                                        <option value="26"<?php if($dBirthday == 26){?>selected="selected"<?php }?>>26</option>
                                        <option value="27"<?php if($dBirthday == 27){?>selected="selected"<?php }?>>27</option>
                                        <option value="28"<?php if($dBirthday == 28){?>selected="selected"<?php }?>>28</option>
                                        <option value="29"<?php if($dBirthday == 29){?>selected="selected"<?php }?>>29</option>
                                        <option value="30"<?php if($dBirthday == 30){?>selected="selected"<?php }?>>30</option>
                                        <option value="31"<?php if($dBirthday == 31){?>selected="selected"<?php }?>>31</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="tr_profession">
                                <th id="th_profession">Profession</th>
                                <td id="td_profession">
                                    <input type="text" name="profession" class="px" value="<?php echo $result[0]['profession']; ?>" />
                                </td>
                            </tr>
                            <tr id="th_address">
                                <th id="th_address">Address</th>
                                <td id="address">
                                    <input type="text" name="address" class="px" value="<?php echo $result[0]['address']; ?>" />
                                </td>
                            </tr>
                            <tr id="td_birthcity">
                                <th id="td_birthcity">Region</th>
                                <td>
                                    <p id="td_birthcity">
                                        <select name="place" id="place" class="ps">
                                            <option value="">-Province-</option>
                                            <option did="1" value="Alberta" <?php if($Jg=='Alberta'){?>selected="selected"<?php }?>>Alberta</option>
                                            <option did="2" value="British Columbia" <?php if($Jg=='British Columbia'){?>selected="selected"<?php }?>>British Columbia</option>
                                            <option did="3" value="Manitoba" <?php if($Jg=='Manitoba'){?>selected="selected"<?php }?>>Manitoba</option>
                                            <option did="4" value="New Brunswick" <?php if($Jg=='New Brunswick'){?>selected="selected"<?php }?>>New Brunswick</option>
                                            <option did="5" value="Newfoundland" <?php if($Jg=='Newfoundland'){?>selected="selected"<?php }?>>Newfoundland</option>
                                            <option did="6" value="Nova Scotia" <?php if($Jg=='Nova Scotia'){?>selected="selected"<?php }?>>Nova Scotia</option>
                                            <option did="7" value="Ontario" <?php if($Jg=='Ontario'){?>selected="selected"<?php }?>>Ontario</option>
                                            <option did="8" value="Prince Edward Island" <?php if($Jg=='Prince Edward Island'){?>selected="selected"<?php }?>>Prince Edward Island</option>
                                            <option did="9" value="Quebec" <?php if($Jg=='Quebec'){?>selected="selected"<?php }?>>Quebec</option>
                                            <option did="10" value="Saskatchewan" <?php if($Jg=='Saskatchewan'){?>selected="selected"<?php }?>>Saskatchewan</option>
                                            <option did="11" value="Oversea" <?php if($Jg=='Oversea'){?>selected="selected"<?php }?>>Oversea</option>
                                            <option did="12" value="Others" <?php if($Jg=='Others'){?>selected="selected"<?php }?>>Others</option>
                                        </select>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>Date of Registraion</th>
                                <td><?php echo $dateofregistraion; ?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                    <button type="submit" name="adminprofilesubmitbtn" id="adminprofilesubmitbtn" value="true" class="pn pnc" /><strong>Save</strong></button>
                                    <input name="uid" type="hidden" value="<?php echo $uid; ?>" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--LIST end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

