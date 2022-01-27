<table class="table table-bordered " style="border: 2px;">
    <thead class="text-dark">
        <tr>

            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Major</th>
            <th>Department Name</th>
            <th>Student Type</th>

        </tr>
    </thead>

    <tbody style="border: 3px;">
        <tr>
            <td>
                <h5> <?php echo $db_id; ?>
                </h5>
            </td>
            <td>
                <h5> <?php echo $db_first_name; ?>
                </h5>
            </td>
            <td>
                <h5> <?php echo $db_last_name; ?>
                </h5>
            </td>
            <td>
                <h5> <?php echo $major; ?>
                </h5>
            </td>
            <td>
                <h5> <?php echo $Department; ?>
                </h5>
            </td>
            <td>
                <h5> <?php echo $db_studenttype; ?>
                </h5>
            </td>
        </tr>
    </tbody>
</table>