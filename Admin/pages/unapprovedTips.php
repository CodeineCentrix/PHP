<div style="width: 100%;">
    <h1 style="text-align: center;">Approve a tip&trick</h1> <hr><br>
    
   <?php if (isset($approve)>0):?>
    <p class="warning-green">Tip Approved</p>
    <?php elseif(isset($rejected)>0):?>
        <p class="warning-red">Tip Rejected</p>
    <?php endif;?>
    <table class="table table-bordered" style="width: 80%;">
        <thead><th>Tip</th><th>Approve</th><th>Reject</th></thead>
    <tbody>
             <?php foreach ($unapprovedTips as $tips): ?>
            <tr>
                <td><?php echo $tips[4]; ?></td> 
                <td>
                    <form action="../Controller/MainController.php?action=approve-tips" method="post">
                    <input type="hidden" name="tipId" value="<?php echo $tips[0];?>" >
                    <input type="image" src ="../Resources/Images/approve.png" alt="Approve"> 
                    </form>
                </td>
                <td><form method="POST" action="?action=rej_tips">
                    <input type="hidden" value="<?php echo $tips[0];?>" name="tipId">
                    <input type="image" src="../Resources/Images/rubbish-bin.png">
                </form>
            </td>
            </tr>
            <?php endforeach;?>
    </tbody>
        </table>
</div>