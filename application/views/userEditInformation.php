<div style="padding:20px;">
  <title>User Dashboard: Edit Information</title>
  <h1>User Edit Information</h1>
  <form action="editInformationQuery" method="POST">
    <input type="hidden" id="edit_email" name="edit_email" value="<?php echo $data[0]["User"]["email"]; ?>"><br><br>
    <label>Name:</label><br>
    <input type="text" id="edit_name" name="edit_name" value="<?php echo $data[0]["User"]["name"]; ?>"><br><br>
    <label>Old Password:</label><br>
    <input type="password" id="edit_old_password" name="edit_old_password"><br><br>
    <label>New Password:</label><br>
    <input type="password" id="edit_new_password" name="edit_new_password" onchange='check_pass();'><br><br>
    <label>Retype New Password:</label><br>
    <input type="password" id="edit_retype_password" name="edit_retype_password" onchange='check_pass();'><br><br>
    <label>Date of birth:</label><br>
    <input type="date" id="edit_dob" name="edit_dob" value="<?php echo $data[0]["User"]["date_of_birth"]; ?>" min="1921-01-01" max="<?php echo CURRENT_TIME; ?>"><br><br>
    <input type="submit" value="Submit" id="edit_submit" class="detail-button" disabled>
  </form>
</div>

<script>
  function check_pass() {
    if (document.getElementById('edit_new_password').value ==
            document.getElementById('edit_retype_password').value && document.getElementById('edit_name') != '' && document.getElementById('edit_old_password') != '') {
        document.getElementById('edit_submit').disabled = false;
    } else {
        document.getElementById('edit_submit').disabled = true;
    }
}
</script>