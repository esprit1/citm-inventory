<?php include 'header.php'; ?>

	<div class="content wrapper">
		<div class="shadow">

<?php if( $_GET['usr'] == 'user' ) { ?>
			<?php include 'user.php'; ?>
<?php } ?>

<?php if( $_GET['usr'] == 'sec' ) { ?>
			<?php include 'security.php'; ?>
<?php } ?>

<?php if( $_GET['usr'] == 'it' ) { ?>
			<?php include 'it.php'; ?>
<?php } ?>

<?php if( $_GET['usr'] == 'hd' ) { ?>
			<?php include 'helpdesk.php'; ?>
<?php } ?>

		</div>
	</div>

<?php include 'footer.php'; ?>