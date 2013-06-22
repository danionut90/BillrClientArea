<?php include 'header.php' ?>

<h3>View project: <?= $project['name'] ?></h4>
<br/>

<h4>Tracking</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Start</th>
            <th>Stop</th>
            <th>Staff</th>
            <th>Hourly</th>
            <th>Invoiced</th>
        </thead>          

        <tbody>
        <?php foreach ($trackings as $row) { ?>
            <tr>
                <td><?= format_datetime($row['start']) ?></td>
                <td><?= format_datetime($row['stop'])?></td>
                <td><?= $row['staff'] ?></td>
                <td><?= $row['hourly'] ?></td>
                <td><?= format_mapping($row['invoiced'], 'tracking_invoiced') ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<h4>Task</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Time</th>
            <th>Subject</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Status</th>
            <th>Billable</th>
            <th>Invoiced</th>
        </thead>          

        <tbody>
        <?php foreach ($tasks as $row) { ?>
            <tr>
                <td><?= format_datetime($row['timestamp']) ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= $row['unit'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= format_currency($row['unitPrice'])?></td>
                <td><?= format_mapping($row['status'], 'task_status') ?></td>
                <td><?= format_mapping($row['isBillable'], 'task_billable') ?></td>
                <td><?= format_mapping($row['invoiced'], 'task_invoiced') ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>

<h4>Attachment</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Timestamp</th>
            <th>Files</th>
        </thead>          

        <tbody>
        <?php foreach ($attachments as $row) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= format_datetime($row['timestamp']) ?></td>
                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include 'footer.php' ?>