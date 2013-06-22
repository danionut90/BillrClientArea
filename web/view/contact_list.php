<?php include 'header.php' ?>

<h4>Contact list</h4>
<br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th></th>
        </thead>

        <tbody>
        <?php foreach ($contacts as $row) { ?>
            <tr>
                <td><?= $row['firstname'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a target="_blank" href="<?= APP_URL ?>/contact/edit?id=<?= $row['id'] ?>">Edit</a>
                    <a onclick="return confirm('Are you really want to delete this contact?')" href="<?= APP_URL ?>/contact/delete?id=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include 'footer.php' ?>