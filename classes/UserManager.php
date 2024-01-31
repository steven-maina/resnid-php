<?php
  include "auth/database.php";

    class UserManager {
   private $link;

    public function __construct($link) {
        $this->link = $link;
    }


    public function getUserInfo($userId) {
        // Escape user input to prevent SQL injection
        $userId = mysqli_real_escape_string($this->link, $userId);

        $sql = "SELECT * FROM users WHERE id = $userId";

        $result = mysqli_query($this->link, $sql);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $user ? $user : false;
        } else {
            return false;
        }
    }
}
?>