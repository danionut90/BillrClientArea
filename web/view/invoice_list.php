<?php include 'header.php' ?>

<h4>Invoice list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Id</th>
            <th>Subject</th>
            <th>Issue Date</th>
            <th>Due date</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Payment</th>
            <th></th>
        </thead>

        <tbody>
        <?php foreach ($invoices as $row) { ?>
            <tr>
                <td><?= $row['number'] ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= format_date($row['issueDate']) ?></td>
                <td><?= format_date($row['dueDate']) ?></td>
                <td><?= format_mapping($row['status'], 'invoice_status') ?></td>
                <td><?= format_currency($row['totalAmount']) ?></td>
                <td><?= format_currency($row['totalPayment']) ?></td>
                <td>
                    <a target="_blank" href="<?= APP_URL ?>/invoice/view?id=<?= $row['id'] ?>">View</a>                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<h4>Estimate list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Id</th>
            <th>Subject</th>
            <th>Issue Date</th>
            <th>Due date</th>
            <th>Status</th>
            <th>Amount</th>
            <th></th>
        </thead>

        <tbody>
        <?php foreach ($estimates as $row) { ?>
            <tr>
                <td><?= $row['number'] ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= format_date($row['issueDate']) ?></td>
                <td><?= format_date($row['dueDate']) ?></td>
                <td><?= format_mapping($row['status'], 'invoice_status') ?></td>
                <td><?= format_currency($row['totalAmount']) ?></td>
                <td>
                    <a target="_blank" href="<?= APP_URL ?>/estimate/view?id=<?= $row['id'] ?>">View</a>                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>
