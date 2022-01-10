<?php
class Friend3{
    protected $db;
    public function __construct($db_connection){
        $this->db = $db_connection;
    }
    public function is_already_friends($my_id, $user_id){
        try{
            $sql = "SELECT * FROM `friends` WHERE (user_one = :my_id AND user_two = :frnd_id AND game = 'racing') OR (user_one = :frnd_id AND user_two = :my_id AND game = 'racing')";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $stmt->bindValue(':frnd_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() === 1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function am_i_the_req_sender($my_id, $user_id){
        try{
            $sql = "SELECT * FROM `friend_request` WHERE sender = ? AND receiver = ? AND game = 'racing'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$my_id, $user_id]);
            if($stmt->rowCount() === 1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function am_i_the_req_receiver($my_id, $user_id){
        try{
            $sql = "SELECT * FROM `friend_request` WHERE sender = ? AND receiver = ? AND game = 'racing'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id, $my_id]);
            if($stmt->rowCount() === 1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function is_request_already_sent($my_id, $user_id){
        try{
            $sql = "SELECT * FROM `friend_request` WHERE (sender = :my_id AND receiver = :frnd_id AND game = 'racing') OR (sender = :frnd_id AND receiver = :my_id AND game = 'racing')";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $stmt->bindValue(':frnd_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() === 1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function make_pending_friends($my_id, $user_id){
        
        try{
            $sql = "INSERT INTO `friend_request`(sender, receiver, game) VALUES(?,?,'racing')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$my_id, $user_id]);
            header('Location: user_profile.php?id='.$user_id);
            exit;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function cancel_or_ignore_friend_request($my_id, $user_id){
        try{
            $sql = "DELETE FROM `friend_request` WHERE (sender = :my_id AND receiver = :frnd_id AND game = 'racing') OR (sender = :frnd_id AND receiver = :my_id AND game = 'racing')";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $stmt->bindValue(':frnd_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: user_profile.php?id='.$user_id);
            exit;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function make_friends($my_id, $user_id){
        try{
            $delete_pending_friends = "DELETE FROM `friend_request` WHERE (sender = :my_id AND receiver = :frnd_id AND game = 'racing') OR (sender = :frnd_id AND receiver = :my_id AND game = 'racing')";
            $delete_stmt = $this->db->prepare($delete_pending_friends);
            $delete_stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $delete_stmt->bindValue(':frnd_id', $user_id, PDO::PARAM_INT);
            $delete_stmt->execute();
            if($delete_stmt->execute()){
                $sql = "INSERT INTO `friends`(user_one, user_two, game) VALUES(?, ?, 'racing')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$my_id, $user_id]);
                header('Location: user_profile.php?id='.$user_id);
                exit;
            }            
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete_friends($my_id, $user_id){
        try{
            $delete_friends = "DELETE FROM `friends` WHERE (user_one = :my_id AND user_two = :frnd_id AND game = 'racing') OR (user_one = :frnd_id AND user_two = :my_id AND game = 'racing')";
            $delete_stmt = $this->db->prepare($delete_friends);
            $delete_stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $delete_stmt->bindValue(':frnd_id', $user_id, PDO::PARAM_INT);
            $delete_stmt->execute();
            header('Location: user_profile.php?id='.$user_id);
            exit;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function request_notification($my_id, $send_data){
        try{
            $sql = "SELECT sender, username, user_image FROM `friend_request` JOIN users ON friend_request.sender = users.id WHERE receiver = ? AND game = 'racing'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$my_id]);
            if($send_data){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                return $stmt->rowCount();
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function get_all_friends($my_id, $send_data){
        try{
            $sql = "SELECT * FROM `friends` WHERE user_one = :my_id OR user_two = :my_id AND game = 'racing'";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
            $stmt->execute();
                if($send_data){
                    $return_data = [];
                    $all_users = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach($all_users as $row){
                        if($row->user_one == $my_id){
                            $get_user = "SELECT id, username, user_image FROM `users` WHERE id = ?";
                            $get_user_stmt = $this->db->prepare($get_user);
                            $get_user_stmt->execute([$row->user_two]);
                            array_push($return_data, $get_user_stmt->fetch(PDO::FETCH_OBJ));
                        }else{
                            $get_user = "SELECT id, username, user_image FROM `users` WHERE id = ?";
                            $get_user_stmt = $this->db->prepare($get_user);
                            $get_user_stmt->execute([$row->user_one]);
                            array_push($return_data, $get_user_stmt->fetch(PDO::FETCH_OBJ));
                        }
                    }
                    return $return_data;
                }
                else{
                    return $stmt->rowCount();
                }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>