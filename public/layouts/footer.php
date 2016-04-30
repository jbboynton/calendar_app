
  <footer>
    <p>
      <strong><em>Sad Calendar App</em></strong><br />
      Systems Analysis &amp; Design<br />
      Spring <?php echo date("Y") ?>
    </p>
    <p>
      <strong>Group 2:</strong><br />
      James Boynton<br />
      Matt Cariglio<br />
      Mark Curtis<br />
      Sean Maloney<br />
    </p>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">
  </script>
  <script   src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
  </script>
</body>
</html>

<?php if(isset($db)) { $db->close(); } ?>
