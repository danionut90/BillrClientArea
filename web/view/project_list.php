<?php include 'header.php' ?>

<h4>Project list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Type</th>
            <th>Code</th>
            <th>Budget</th>
            <th>Due date</th>
            <th></th>
        </thead>            

        <tbody>
        <?php foreach ($projects as $row) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= format_mapping($row['status'], 'project_status') ?></td>
                <td><?= format_mapping($row['idType'], 'project_type') ?></td>
                <td><?= $row['code'] ?></td>
                <td><?= format_currency($row['budget']) ?></td>
                <td><?= format_date($row['dueDate']) ?></td>

                <td>
                    <a target="_blank" href="<?= APP_URL ?>/project/view?id=<?= $row['id'] ?>">View</a>                    
                </td>
            </tr>
        <?php } ?>
    </table>

<?php include 'footer.php' ?>