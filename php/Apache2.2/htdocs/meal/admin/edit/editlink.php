

<form name="form1" method="post" action="../save/saveeditlink.php" onSubmit="return chkinput(this);">
<table>
  <tr>
    <td colspan="2"><div class="main-title"></div></td>
  </tr>
        <tr>
          <td>链接ID：</td>
          <td><div align="left">&nbsp;<input value="" type="text" name="linkid" class="inputcss" size="30"></div></td>
        </tr>
        <tr>
          <td>链接内容：</td>
          <td><div align="left">&nbsp;<input value="" type="text" name="linkname" class="inputcss" size="30"></div></td>
        </tr>
                <tr>
          <td>链接说明：</td>
          <td><div align="left">&nbsp;<input value="" type="text" name="linkinfo" class="inputcss" size="30"></div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="确定">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="返回" class="buttoncss">
    </td>
  </tr>
</table>
</form>