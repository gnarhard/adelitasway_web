<?php
// Use in the "Post-Receive URLs" section of your GitHub repo.
if ($_POST['payload']) {
    shell_exec('cd /home4/adelitas/public_html && git pull'); // Replace with your actual directory
}
