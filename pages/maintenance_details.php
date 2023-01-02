<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

$date1='';
$date2='';
$main_id='';
if(isset($_POST['date1']) && isset($_POST['date2'])){
    $date1=date("Y-m-d", strtotime($_POST['date1']));
    $date2=date("Y-m-d", strtotime($_POST['date2']));
    $main_id=$_POST['id'];
}
$getplate='';
$r1=$db->select('plate','*','ID='.$main_id);
while($rr=mysqli_fetch_assoc($r1)){
    $getplate=$rr['plate'];
}
?>

<div class="exp-details-cont">
    <div>
        <h4 class="exp-details"><span style="font-size:1rem;font-weight:600;color:#000;margin-right:10px;">Plate #:</span><?=$getplate;?></h4>
    </div>
    <div>
        <h6 style="margin-left:34px;">Lists of Expenses from <b><?=date("M d, Y", strtotime($_POST['date1']))?></b> to <b><?=date("M d, Y", strtotime($_POST['date2']))?></b></h5>
    </div>    
    <table>
        <thead>
            <tr class="throw">
                <th></th>
                <th>Date</th>
                <th>Amount</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                $res=$db->select('maintenance','*','plateid='.$main_id.' AND transactiondate>="'.$date1.'" AND transactiondate<="'.$date2.'" ORDER BY transactiondate ASC');
                while($rw=mysqli_fetch_assoc($res)){
            ?>
                <tr>
                    <td>
                        <?=$i++;?>
                    </td>
                    <td>
                        <?=date("M d, Y", strtotime($rw['transactiondate']));?>
                    </td>
                    <td>
                        <?=number_format($rw['amount']);?>
                    </td>
                    <td>
                        <?=$rw['remarks'];?>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr class="throw">
                <td colspan="3">
                    <?php
                        $res=$db->select('maintenance','SUM(amount) as totalexp','plateid='.$main_id.' AND transactiondate>="'.$date1.'" AND transactiondate<="'.$date2.'"');
                        while($rw=mysqli_fetch_assoc($res)){
                            echo "<span style='margin-right:10px;font-weight:600;'>Total:</span><span style='font-weight:bold;font-size:1.3rem;color:darkred;'>".number_format($rw['totalexp'])."</span>";
                        }
                    ?>
                </td>
                <td>

                </td>
            </tr>
        </tfoot>
    </table>
</div>