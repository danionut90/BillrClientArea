<?php include 'header.php' ?>

<h4>Order list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Order number</th>
            <th>Product</th>
            <th>Date</th>
            <th>Payment Term</th>            
            <th>Amount</th>
            <th>Payment</th>
            <th>Status</th>
        </thead>

        <tbody>
        <?php foreach ($orders as $row) { ?>
            <tr>
                <td><?= $row['orderNumber'] ?></td>
                <td><?= $row['idProduct'] ?></td>
                <td><?= format_date($row['timestamp']) ?></td>
                <td><?= format_mapping($row['idOrderPaymentTerm'], 'order_payment_term') ?></td>
                <td></td>
                <td></td>
                <td><?= format_mapping($row['status'], 'order_status') ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include 'footer.php' ?>
