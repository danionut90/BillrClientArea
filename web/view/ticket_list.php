<?php include 'header.php' ?>

<h4>Ticket list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Id</th>
            <th>Subject</th>
            <th>Status</th>
            <th></th>
        </thead>

        <tbody>
        <?php foreach ($tickets as $row) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= format_mapping($row['status'], 'ticket_status') ?></td>
                <td>
                    <a target="_blank" href="<?= APP_URL ?>/ticket/view?id=<?= $row['id'] ?>">View</a>                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include 'footer.php' ?>