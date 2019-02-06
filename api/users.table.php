<style>
table {
	border-collapse: collapse;
	border-spacing: 0;
}

td,
th {
	padding: 5px;
	border-bottom: 1px solid #aaa;
}
</style>
<?php
include('config.php');
include ('common.php');

$connection = new PDO($dsn, $username, $password, $options);

$sql = "SELECT * 
				FROM users
				";

$statement = $connection->prepare($sql);
//$statement->bindParam(':location', $location, PDO::PARAM_STR);
$statement->execute();

$result = $statement->fetchAll();
?>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Username</th>
					<th>Email Address</th>
					<th>Profile Pic</th>
					<th>Bio</th>
					<th>Date</th>
					<th>IP</th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($result as $row) { ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["name"]); ?></td>
				<td><?php echo escape($row["username"]); ?></td>
				<td><?php echo escape($row["email"]); ?></td>
				<td><?php echo escape($row["profile_pic"]); ?></td>
				<td><?php echo escape($row["bio"]); ?></td>
				<td><?php echo escape($row["date"]); ?></td>
				<td><?php echo escape($row["ip_address"]); ?> </td>
			</tr>
		<?php } ?> 
			</tbody>
	</table>
