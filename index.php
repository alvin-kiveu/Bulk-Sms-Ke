<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href='style.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  </meta>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <div class="card">
      <h2>SMS BOX</h2>
      <form action="smsprocessor.php" method="POST">
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" placeholder="Enter your Phone" required>
        <label for="password">Message</label>
        <textarea id="message" name="message" placeholder="Enter your Message" rows="4" required></textarea>
        <button type="submit" name="send">SEND</button>
      </form>
    </div>
  </div>
  <?php if (isset($_GET['success'])) { ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?php echo $_GET['success']; ?>',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php } ?>
  <?php if (isset($_GET['error'])) { ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<?php echo $_GET['error']; ?>',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php } ?>
</body>

</html>