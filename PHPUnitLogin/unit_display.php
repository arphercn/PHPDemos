<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1" style="margin-bottom:5px">
            <tr>
                <td width="100">函式功能</td>
                <td width="400"><?php echo $report['content']?></td>
            </tr>
            <tr>
                <td>验证形态</td>
                <td><?php echo $report['type']?></td>
            </tr>
            <tr>
                <td>验证結果</td>
                <td style="color:<?php echo $report['assert'] == 'Passed'?'green':'red'?>"><?php echo $report['assert']?></td>
            </tr>
        </table>    
    </body>
</html>